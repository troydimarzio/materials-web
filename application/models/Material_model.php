<?php 

class Material_model extends CI_Model {

	public function m_getDataMaterial($where) {
		$query = "SELECT m.*, b.*, s.*, k.*
					FROM t_material m, t_kategori_material k, t_satuan s, t_penyedia p, t_biodata b
					WHERE m.id_penyedia = p.id_penyedia
					AND p.id_biodata = b.id_biodata
					AND m.id_kategori = k.id_kategori
					AND m.id_satuan = s.id_satuan
					AND b.id_biodata = $where";
		return $this->db->query($query);
	}

	public function m_get_where($table, $where) {
		return $this->db->get_where($table, $where);
	}

	public function m_get($table, $start, $offset) {
		return $this->db->get($table, $start, $offset);
	}

	public function m_insertMaterial($table, $data) {
		return $this->db->insert($table, $data);
	}

	public function m_updateMaterial($table, $data, $where) {
		$this->db->update($table, $data, $where);
	}

	public function m_deleteMaterial($table, $where) {
		$this->db->delete($table, $where);
	}
}