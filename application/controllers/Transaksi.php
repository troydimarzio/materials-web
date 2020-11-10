<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('transaksi_model');
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']         = "Materials | Transaksi";
			$data['breadcrumb']    = "transaksi";
			$data['transaksi_all'] = $this->transaksi_model->m_select_transaksi_all()->result();

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb');
			$this->load->view('transaksi/v_transaksi');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
	}
	
	public function konfirmasi($kd_pemesanan) {
		$this->db->update('t_transaksi', ['id_status' => 2], ['kd_pemesanan' => $kd_pemesanan]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Berhasil dikonfirmasi .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('transaksi');
	}

	public function konfirmasi_lunas($kd_pemesanan) {
		$this->db->update('t_transaksi', ['id_status' => 3], ['kd_pemesanan' => $kd_pemesanan]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Berhasil dikonfirmasi .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('transaksi');
	}

	public function delete_transaksi($kd_pemesanan) {
		$this->transaksi_model->m_delete_transaksi('t_transaksi', ['kd_pemesanan' => $kd_pemesanan]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> Berhasil delete transaksi .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('transaksi');
	}
}
