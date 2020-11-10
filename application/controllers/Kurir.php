<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('kurir_model');
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']      = "Materials | Kelola Kurir";
			$data['breadcrumb'] = "Kelola Kurir";
			$data['kurir']      = $this->kurir_model->m_get()->result();

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb', $data);
			$this->load->view('kurir/v_kurir');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
	}

	public function insert() {
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$data1 = [
			'kd_user'  => md5($email),
			'email'    => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'id_level' => 4,
			'status'   => 1
		];
		$kd_user = md5($email);
		$data2 = [
			'kd_user' => $kd_user
		];

		$data3 = [
			'nama_lengkap' => 'Kurir Toko',
			'kd_user' => $kd_user
		];

		$this->kurir_model->m_insert('t_user', $data1);
		$this->kurir_model->m_insert('t_kurir', $data2);
		$this->kurir_model->m_insert('t_biodata', $data3);
		$this->session->set_flashdata('pesan_alert', '<div class="alert alert-success" role="alert">Kurir Berhasil Ditambahkan!</div>');
				redirect('kurir');
	}
}
