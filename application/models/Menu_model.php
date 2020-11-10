<?php 

class Menu_model extends CI_Model {

	public function get($table)
	{
		return $this->db->get($table)->result();
	}

	public function join($table, $table_join, $on)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table_join, $on);
		return $this->db->get()->result();
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}

	public function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}
}