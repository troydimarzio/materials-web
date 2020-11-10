<?php 

class Transaksi_model extends CI_Model {

	public function m_select_transaksi_all() {
		$query = "SELECT t.*, m.*, b.* FROM t_transaksi t, t_material m, t_biodata b
					WHERE t.id_material = m.id_material
					AND t.id_biodata = b.id_biodata";
		return $this->db->query($query);
	}

	public function m_delete_transaksi($table, $where) {
		return $this->db->delete($table, $where);
	}
}