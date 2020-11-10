<?php 

class Profil_model extends CI_Model {

	public function m_get($table) {
		return $this->db->get($table);
	}

	public function m_getToko($where) {
		$query = "SELECT p.*, b.*, bank.*, r.*
					FROM t_penyedia p, t_biodata b, t_user u, t_bank bank, t_rating r
					WHERE p.id_biodata = b.id_biodata
					AND b.kd_user = u.kd_user
					AND p.id_bank = bank.id_bank
					AND p.id_rating = r.id_rating
					AND b.id_biodata = $where";
		return $this->db->query($query);
	}

	public function m_getTukang($where) {
		$query = "SELECT t.*, b.*, s.*, r.*
					FROM t_tukang t, t_biodata b, t_spesialis s, t_rating r
					WHERE t.id_biodata = b.id_biodata
					AND t.id_spesialis = s.id_spesialis
					AND t.id_rating = r.id_rating
					AND b.id_biodata = $where";
		return $this->db->query($query);
	}

	public function m_getProfil($email) {
		$this->db->select('*');
		$this->db->from('t_biodata');
		$this->db->join('t_user', 't_user.kd_user = t_biodata.kd_user');
		$this->db->where($email);
		return $this->db->get();
	}

	public function m_insertProfilToko($table, $data) {
		return $this->db->insert($table, $data);
	}

	public function m_editProfilToko($table, $data, $where) {
		return $this->db->update($table, $data, $where);
	}
}