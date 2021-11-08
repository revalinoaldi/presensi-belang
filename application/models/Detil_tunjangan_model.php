<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detil_tunjangan_model extends CI_Model {
	private $tbl = 'tbl_detil_tunjangan_setting';
	private $view = 'v_tunjangan';
	public function show($where='')
		{
			$this->db->select('*');
			$this->db->from($this->tbl);
			if (@$where) {
				$this->db->where($where);
			}
			return $this->db->get();
		}

	public function showView($where='')
	{
		$this->db->select('*');
		$this->db->from($this->view);
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

	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete($this->tbl);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}

/* End of file Detil_tunjangan_model.php */
/* Location: ./application/models/Detil_tunjangan_model.php */