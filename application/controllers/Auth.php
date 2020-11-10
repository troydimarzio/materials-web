<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/*
		Author : Troy mokoagow
	*/
		
	function __construct(){
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		$config = [
			[
				'field'  => 'email',
				'label'  => 'Email',
				'rules'  => 'required|trim|valid_email',
				'errors' => [
					'required'    => '%s wajib diisi!',
					'valid_email' => '%s tidak valid!'
				]
			],
			[
				'field'  => 'password',
				'label'  => 'Password',
				'rules'  => 'required|trim',
				'errors' => ['required' => '%s wajib diisi!',]
			]
		];
		$this->form_validation->set_rules($config);
		if($this->session->userdata('nama') == '') {
			if($this->form_validation->run() == FALSE) {

				$data['title'] = "Materials | Masuk";

				$this->load->view('templates/head', $data);
				$this->load->view('auth/v_login', $data);
				$this->load->view('templates/footer');
				$this->load->view('templates/js');
			} else {
				$this->_login();
			}
		} else {
			redirect('home');
		}
	}

	private function _login()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->auth_model->join(['email' => $email]);

		// cek email
		if($user){
			// cek status for user aktivation
			if($user['status'] == 1){
				// cek password
				if(password_verify($password, $user['password'])){
					$data_session = [
						'email'      => $user['email'],
						'nama'       => $user['nama_lengkap'],
						'level'      => $user['level'],
						'photo'      => $user['photo_profil'],
						'id_biodata' => $user['id_biodata'],
						'kd_user'    => $user['kd_user']
					];
					$this->session->set_userdata($data_session);
					redirect('home', 'refrash');
				} else {
					$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Email belum di aktivasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Email belum pernah terdaftar!</div>');
			redirect('auth');
		}
	}

	public function regis()
	{
		$config = [
			[
				'field'  => 'nama',
				'label'  => 'Nama',
				'rules'  => 'trim|required|min_length[3]|max_length[20]',
				'errors' => [
					'required'   => '%s tidak boleh kosong!',
					'min_length' => '%s terlalu pendek!',
					'max_length' => '%s terlalu panjang!'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'Email',
				'rules'  => 'trim|required|valid_email|is_unique[t_user.email]',
				'errors' => [
					'required'    => '%s tidak boleh kosong!',
					'valid_email' => '%s tidak valid!',
					'is_unique'   => '%s sudah pernah terdaftar!'
				]
			],
			[
				'field'  => 'password',
				'label'  => 'Password',
				'rules'  => 'trim|required|min_length[3]',
				'errors' => [
					'required' => '%s tidak boleh kosong!',
					'min_length' => '%s terlalu pendek!'
				]
			],
			[
				'field'  => 'passconf',
				'label'  => 'Password konfirmasi',
				'rules'  => 'trim|required|matches[password]',
				'errors' => [
					'required' => '%s tidak boleh kosong!',
					'matches'  => '%s tidak valid!'
				]
			]
		];
		$this->form_validation->set_rules($config);
		$this->form_validation->set_rules('level', 'Level', 'required|callback_check_default');
		$this->form_validation->set_message('check_default', 'Pilih salah satu!');

		if($this->session->userdata('nama') == '') {
			if($this->form_validation->run() == FALSE){

				$data['title'] = "Materials | Daftar";
				// ambil data level
				$data['level'] = $this->auth_model->get_limit('t_level', 2, 2);

				$this->load->view('templates/head', $data);
				$this->load->view('auth/v_regis', $data);
				$this->load->view('templates/footer');
				$this->load->view('templates/js');
			} else {
				$nama     = htmlspecialchars($this->input->post('nama', TRUE));
				$email    = htmlspecialchars($this->input->post('email', TRUE));
				$password = htmlspecialchars($this->input->post('password', TRUE));
				$level    = $this->input->post('level');

				$user = [
					'kd_user'  => md5($email),
					'email'    => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'id_level' => $level
				];
				
				$kd_user = md5($email);
				$biodata = [
					'nama_lengkap' => $nama,
					'kd_user' => $kd_user
				];

				// siapkan token
				$token = uuid_generator();
				$user_token = [
					'kd_token'     => uuid_generator(),
					'email'        => $email,
					'token'        => $token,
					'date_created' => time()
				];
				
				$this->auth_model->insert('t_user', $user);
				$this->auth_model->insert('t_biodata', $biodata);
				$this->auth_model->insert('t_user_token', $user_token);

				// kirim email aktivasi
				$this->_sendEmail($token, 'verifikasi');
				$this->session->set_flashdata('pesan_alert', '<div class="alert alert-info" role="alert">Registrasi berhasil, cek email untuk aktivasi akun!</div>');
				redirect('auth');
			}
		} else {
			redirect('home');
		}
		
	}

	// cek combo box pilih level. jika default akan ada pesan error
	function check_default($str){
		return $str == 'default' ? FALSE : TRUE;
	}

	private function _sendEmail($token, $tipe)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'troymokoagow86@gmail.com',
			'smtp_pass' => 'troyoke86',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('troymokoagow86@gmail.com', 'Owner Materials');
		$this->email->to($this->input->post('email'));

		if($tipe == 'verifikasi') {
			$this->email->subject('Aktivasi Akun Materials!');
			$this->email->message(
				'<h3>Hi, terima kasih sudah mendaftar di Materials ..</h3> <br>
				<h4>Silahkan klik link dibawah untuk mengaktifkan akunmu! </h4><br><br>
				<a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . $token . '">Aktivasi</a>');
		}

		if($this->email->send()) {
			return TRUE;
		} else {
			echo $this->email->print_debugger();
			die();
		}
	}

	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->auth_model->get_where('t_user', ['email' => $email]);

		if($user) {

			$user_token = $this->auth_model->get_where('t_user_token', ['token' => $token]);
			if($user_token) {
				// if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->auth_model->update('t_user', ['status' => 1], ['email' => $email]);
					$this->auth_model->delete('t_user_token', ['email' => $email]);

					$this->session->set_flashdata('pesan_alert', '<div class="alert alert-success" role="alert">Email '. $email .' telah diaktivasi! Silahkan login ..</div>');
					redirect('auth');
				// } else {
				// 	$this->auth_model->delete('t_user', ['email' => $email]);
				// 	$this->auth_model->delete('t_user_token', ['email' => $email]);
				// 	$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! token expired!</div>');
				// 	redirect('auth');
				// }
			} else {
				$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! token tidak diketahui!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan_alert', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! email tidak diketahui!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('photo');
		$this->session->unset_userdata('id_biodata');
		$this->session->unset_userdata('kd_user');

		$this->session->set_flashdata('pesan_alert', '<div class="alert alert-success" role="alert">Berhasil logout ..</div>');
		redirect('auth');
	}

} // class auth
