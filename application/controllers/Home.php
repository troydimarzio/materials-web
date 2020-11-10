<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']      = "Materials | Halaman utama";
			$data['breadcrumb'] = "halaman utama";

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb', $data);
			$this->load->view('v_home');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
	}
}
