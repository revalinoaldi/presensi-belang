<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LemburanModel extends CI_Model {

	private $tbl = 'tbl_lemburan';	

	public function show($where='')
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		if (@$where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function showSum($where='')
	{
		$this->db->select('SUM(total_jam) as total_jam_lembur');
		$this->db->from($this->tbl);
		if (@$where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function insert($object)
	{
		$this->db->insert($this->tbl, $object);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}

/* End of file LemburanModel.php */
/* Location: ./application/models/LemburanModel.php */