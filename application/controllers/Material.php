<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

	/**
	 * author : Troy Mokoagow
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('material_model');
		if(!$this->session->userdata('nama')) {
			redirect('auth');
		}
	}

	public function index()
	{
			$data['title']      = "Materials | Data material";
			$data['breadcrumb'] = "Data material";

			$id_biodata = $this->session->userdata('id_biodata');
			
			$data['material'] = $this->material_model->m_getDataMaterial($id_biodata)->result();
			$data['kategori'] = $this->material_model->m_get('t_kategori_material', 9, 1)->result();
			$data['satuan']   = $this->material_model->m_get('t_satuan', 0, 0)->result();
			$data['toko']     = $this->material_model->m_get_where('t_penyedia', ['id_biodata' => $id_biodata])->row_array();

			$this->load->view('templates/head', $data);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/breadcrumb');
			$this->load->view('material/v_material', $data);
			$this->load->view('templates/modal', $data);
			$this->load->view('templates/js');
	}

	public function insertMaterial() {
		$id_penyedia = $this->input->post('id_penyedia');
		$id_material = $this->input->post('id_material');
		$nama        = $this->input->post('nama_material');
		$harga       = $this->input->post('harga');
		$stok        = $this->input->post('stok');
		$deskripsi   = $this->input->post('deskripsi');
		$kategori    = $this->input->post('kategori');
		$satuan      = $this->input->post('satuan');

		$foto        = $_FILES['fotto']['name'];

		$data = [
			'nama_material'  => $nama,
			'deskripsi'      => $deskripsi,
			'id_kategori'    => $kategori,
			'id_satuan'      => $satuan,
			'harga'          => $harga,
			'stok'           => $stok,
			'id_penyedia'    => $id_penyedia
		];

		if($foto) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']      = '2048';
			$config['upload_path']   = './assets/img/upload/material/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('fotto')) {
				$foto_baru = $this->upload->data('file_name');
				$this->db->set('photo_material', $foto_baru);
			} else {
				echo $this->upload->display_errors();
			}
		}

		if($id_material == '') {
			$this->material_model->m_insertMaterial('t_material', $data);
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> data material berhasil ditambahakan .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('material');
		} else {
			$this->db->set('nama_material', $nama);
			$this->db->set('harga', $harga);
			$this->db->set('stok', $stok);
			$this->db->set('id_satuan', $satuan);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('id_kategori', $kategori);
			$this->db->where('id_material', $id_material);
			$this->db->update('t_material');
			$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> data material berhasil diubah .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('material');
		}
	}

	public function deleteMaterial($id) {
		$this->material_model->m_deleteMaterial('t_material', ['id_material' => $id]);
		$this->session->set_flashdata('pesan_alert', '<div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> data material berhasil dihapus .. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
			redirect('material');
	}
}
