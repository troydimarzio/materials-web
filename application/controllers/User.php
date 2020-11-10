<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
		$this->load->model('user_model');
	}

	public function index()
	{
		// pagination
		$config['base_url']    = base_url('user/index');
		$config['total_rows']  = $this->db->count_all('t_user');
		$config['per_page']    = 10;
		$config['uri_segment'] = 3;
		$choice                = $config['total_rows'] / $config['per_page'];
		$config['num_links']   = floor($choice);

		// // style pagination with bootstrap
		$config['full_tag_open']   = '<ul class="pagination justify-content-end">';
		$config['full_tag_close']  = '</ul>';
		$config['attributes']      = ['class' => 'page-link'];
		$config['first_link']      = false;
		$config['last_link']       = false;
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link']       = '&laquo';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';
		$config['next_link']       = '&raquo';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li style="z-index:0;" class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open']    = '<li class="page-item">';
		$config['num_tag_close']   = '</li>';
		
		$this->pagination->initialize($config);
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['title']      = "Materials | Kelola user";
		$data['breadcrumb'] = "kelola user";
		$data['user']       = $this->user_model->join('t_user', 't_level', 't_level.id_level = t_user.id_level', $config['per_page'], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/breadcrumb');
		$this->load->view('user/v_user');
		$this->load->view('templates/pagination');
		$this->load->view('templates/modal');
		$this->load->view('templates/js');
	}

	public function ubah_user()
	{
		$kd       = $this->input->post('kd');
		$email    = htmlspecialchars($this->input->post('email'), TRUE);
		$password = htmlspecialchars($this->input->post('password'), TRUE);

		$data = [
			'email'    => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT)
		];

		$this->user_model->update('t_user', $data, ['kd_user' => $kd]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> user berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('user');
	}

	public function delete_user($kd)
	{
		$this->user_model->delete('t_user', ['kd_user' => $kd]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> user berhasil dihapus .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('user');
	}

	public function aktif($kd)
	{
		$this->user_model->update('t_user', ['status' => 1], ['kd_user' => $kd]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> user aktif .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('user');
	}

	public function nonaktif($kd)
	{
		$this->user_model->update('t_user', ['status' => 0], ['kd_user' => $kd]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> user tidak aktif .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('user');
	}

	// live search
	public function search(){
		$keyword            = $this->input->post('keyword');
		$data['title']      = "Materials | Kelola user";
		$data['breadcrumb'] = "kelola user";
		$data['user']       = $this->user_model->search($keyword);
		
		$this->load->view('templates/head', $data);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/breadcrumb');
		$this->load->view('user/v_user');
		$this->load->view('templates/modal');
		$this->load->view('templates/js');
	}
}
