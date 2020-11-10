<?php 

class Auth_model extends CI_Model
{
	public function get_limit($table, $offset, $record)
	{
		$this->db->select('*');
		$this->db->limit($offset, $record);
		return $this->db->get($table)->result();
	}

	public function join($where)
	{
		$this->db->select('*');
		$this->db->from('t_user');
		$this->db->join('t_level', 't_level.id_level = t_user.id_level');
		$this->db->join('t_biodata', 't_biodata.kd_user = t_user.kd_user');
		$this->db->where($where);
		return $this->db->get()->row_array();
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where)->row_array();
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update($table);
	}

	public function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}
}