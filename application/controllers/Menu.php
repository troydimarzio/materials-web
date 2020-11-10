<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']      = "Materials | Kelola menu";
			$data['breadcrumb'] = "kelola menu";
			$data['head_menu']  = $this->menu_model->get('t_head_menu');
			$data['menu']       = $this->menu_model->join('t_url', 't_head_menu', 't_head_menu.id_head_menu = t_url.id_head_menu');

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb');
			$this->load->view('menu/v_menu');
			$this->load->view('menu/v_head_menu');
			//$this->load->view('templates/footer');
			$this->load->view('templates/modal');
			$this->load->view('templates/js');
	}

	public function insert()
	{
		$caption = htmlspecialchars($this->input->post('caption', TRUE));
		$status  = $this->input->post('status');
		$sort    = htmlspecialchars($this->input->post('sort', TRUE));
		$id      = $this->input->post('id');

		$data = [
			'caption'    => $caption,
			'status'     => $status,
			'level_sort' => $sort
		];

		if($id == '') {
			$data['id_head_menu'] = auto_inc('id_head_menu', 't_head_menu');
		} else {
			$this->menu_model->update('t_head_menu', $data, ['id_head_menu' => $id]);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> head menu berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
		}

		$this->menu_model->insert('t_head_menu', $data);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> head menu baru berhasil ditambahkan .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
		
	}

	public function delete($id)
	{
		$this->menu_model->delete('t_head_menu', ['id_head_menu' => $id]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> head menu berhasil dihapus .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
	}

	// MENU

	public function insert_menu()
	{
		$menu      = htmlspecialchars($this->input->post('menu', TRUE));
		$url       = htmlspecialchars($this->input->post('url', TRUE));
		$deskripsi = htmlspecialchars($this->input->post('deskripsi', TRUE));
		$icon      = htmlspecialchars($this->input->post('icon', TRUE));
		$sort      = htmlspecialchars($this->input->post('sort', TRUE));
		$head      = $this->input->post('head');
		$status    = $this->input->post('status');
		$id        = $this->input->post('id');

		$data = [
			'title'           => $menu,
			'url'             => $url,
			'deskripsi_url'   => $deskripsi,
			'icon_tipe'       => $icon,
			'id_head_menu'    => $head,
			'status_menu'     => $status,
			'level_sort_menu' => $sort
		];

		if($id == '') {
			$data['id_url'] = auto_inc('id_url', 't_url');
		} else {
			$this->menu_model->update('t_url', $data, ['id_url' => $id]);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> menu berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
		}

		$this->menu_model->insert('t_url', $data);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> menu baru berhasil ditambahkan .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
		
	}

	public function delete_menu($id)
	{
		$this->menu_model->delete('t_url', ['id_url' => $id]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> menu berhasil dihapus .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('menu');
	}


}
