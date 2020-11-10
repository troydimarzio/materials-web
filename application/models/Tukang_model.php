<?php 

class Tukang_model extends CI_Model {

	public function m_get($where){
		$query = "SELECT t.*, u.*, s.*
					FROM t_tukang_toko t, t_user u, t_spesialis s
					WHERE t.kd_user = u.kd_user
					AND t.id_spesialis = s.id_spesialis
					AND u.kd_user = '$where'";
		return $this->db->query($query);
	}

	public function get_spesialis($table) {
		return $this->db->get($table);
	}

	public function m_insert($table, $data){
		return $this->db->insert($table, $data);
	}

	public function m_update($table, $data, $where) {
		return $this->db->update($table, $data, $where);
	}

	public function m_delete($table, $where) {
		return $this->db->delete($table, $where);
	}
}