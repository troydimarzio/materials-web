<?php 

class Kurir_model extends CI_Model {

	public function m_get(){
		$this->db->select('*');
		$this->db->from('t_kurir');
		$this->db->join('t_user', 't_user.kd_user = t_kurir.kd_user');
		return $this->db->get();
	}

	public function m_insert($table, $data){
		return $this->db->insert($table, $data);
	}
}