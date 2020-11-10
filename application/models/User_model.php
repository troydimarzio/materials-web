<?php

class User_model extends CI_Model {

	public function join($table1, $table2, $on, $limit, $start)
	{
		$this->db->select('*, if(status = 1, "Aktif", "Tidak aktif") AS sts');
		$this->db->from($table1);
		$this->db->join($table2, $on);
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}

	public function update($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}

	// live search
	public function search($keyword) {
		$this->db->select('*, if(status = 1, "Aktif", "Tidak aktif") AS sts');
		$this->db->from('t_user');
		$this->db->join('t_level', 't_level.id_level = t_user.id_level');
		$this->db->like('email', $keyword);
		$this->db->or_like('status', $keyword);
		$this->db->or_like('level', $keyword);
		$this->db->or_like('date_created', $keyword);
		return $this->db->get()->result();
	}
}