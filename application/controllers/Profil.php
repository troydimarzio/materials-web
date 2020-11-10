<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('profil_model');
		if(!$this->session->userdata('nama')) {
			// if($this->session->userdata('level') != 'Tukang' || $this->session->userdata('level') != 'Toko/Pabrik') {
			// 	redirect(base_url());
			// }
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title']      = "Materials | Profil";
		$data['breadcrumb'] = "Profil";

		$id_biodata = $this->session->userdata('id_biodata');
		$data['bank']      = $this->profil_model->m_get('t_bank')->result();
		$data['spesialis'] = $this->profil_model->m_get('t_spesialis')->result();
		$data['toko']      = $this->profil_model->m_getToko($id_biodata)->result();
		$data['tukang']    = $this->profil_model->m_getTukang($id_biodata)->result();
		$email             = $this->session->userdata('email');
		$data['profil']    = $this->profil_model->m_getProfil(['email' => $email])->result();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/breadcrumb');
		$this->load->view('profil/v_profil');
		$this->load->view('templates/modal');
		$this->load->view('templates/js');
	}

	public function insertProfilToko() {
		$id_toko    = $this->input->post('id_toko');
		$id_biodata = $this->input->post('id_biodata');
		$nama_toko  = $this->input->post('nama_toko');
		$rekening   = $this->input->post('rekening');
		$bank       = $this->input->post('bank');

		$data = [
			'nama_penyedia' => $nama_toko,
			'id_biodata'    => $id_biodata,
			'rekening'      => $rekening,
			'id_bank'       => $bank
		];

		if($id_toko != '') {
			$this->profil_model->m_editProfilToko('t_penyedia', $data, ['id_biodata' => $id_biodata]);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Profil berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('profil');
		}

		$this->profil_model->m_insertProfilToko('t_penyedia', $data);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Profil berhasil dibuat .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('profil');
	}

	public function editProfil() {
		$id_biodata = $this->input->post('id_biodata');
		$nama       = $this->input->post('nama_lengkap');
		$alamat     = $this->input->post('alamat');
		$foto       = $_FILES['foto']['name'];

		if($foto) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']      = '2048';
			$config['upload_path']   = './assets/img/upload/profil/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')) {
				$foto_baru = $this->upload->data('file_name');
				$this->db->set('photo_profil', $foto_baru);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('nama_lengkap', $nama);
		$this->db->set('alamat', $alamat);
		$this->db->where('id_biodata', $id_biodata);
		$this->db->update('t_biodata');

		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Profil berhasil diedit .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('profil');
	}

	public function profilTukang() {
		$umur       = $this->input->post('umur');
		$lama_kerja = $this->input->post('lama_kerja');
		$no_telpon  = $this->input->post('no_telpon');
		$spesialis  = $this->input->post('spesialis');
		$id_biodata = $this->input->post('id_biodata');
		$id_tukang  = $this->input->post('id_tukang');

		$data = [
			'umur'             => $umur,
			'pengalaman_kerja' => $lama_kerja,
			'no_telpon_tukang' => $no_telpon,
			'id_biodata'       => $id_biodata,
			'id_spesialis'     => $spesialis
		];

		if($id_tukang != '') {
			$this->profil_model->m_editProfilToko('t_tukang', $data, ['id_tukang' => $id_tukang]);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Profil Berhasil Diedit .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('profil');
		}

		$this->profil_model->m_insertProfilToko('t_tukang', $data);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Profil Berhasil Dibuat .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('profil');
	}

	public function bekerja($id) {
		$this->profil_model->m_editProfilToko('t_tukang', ['status_kerja' => 'Bekerja'], ['id_tukang' => $id]);
		redirect('profil');
	}

	public function tidak_bekerja($id) {
		$this->profil_model->m_editProfilToko('t_tukang', ['status_kerja' => 'Tidak Bekerja'], ['id_tukang' => $id]);
		redirect('profil');
	}
}