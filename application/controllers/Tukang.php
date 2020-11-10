<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tukang extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('tukang_model');
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']      = "Materials | Tukang Toko";
			$data['breadcrumb'] = "Tukang Toko";
			$kd_user = $this->session->userdata('kd_user');
			$data['tukang_toko']      = $this->tukang_model->m_get($kd_user)->result();
			$data['spesialis_tt'] = $this->tukang_model->get_spesialis('t_spesialis')->result();

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb', $data);
			$this->load->view('tukang/v_tukang');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
	}

	public function insert() {
		$toko_tt      = $this->input->post('toko_tt');
		$nama_tt      = $this->input->post('nama_tt');
		$pk_tt        = $this->input->post('pk_tt');
		$spesialis_tt = $this->input->post('spesialis_tt');
		$id_tt        = $this->input->post('id_tt');
		$no_telpon_tt = $this->input->post('no_telpon_tt');

		$data = [
			'nama'             => $nama_tt,
			'pengalaman_kerja' => $pk_tt,
			'kd_user'          => $toko_tt,
			'id_spesialis'     => $spesialis_tt,
			'no_telpon_tt'     => $no_telpon_tt
		];

		if($id_tt != '') {
			$this->tukang_model->m_update('t_tukang_toko', $data, ['id_tukang_toko' => $id_tt]);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Tukang berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('tukang');
		}

		$this->tukang_model->m_insert('t_tukang_toko', $data);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Tukang berhasil dibuat .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('tukang');
	}
}
