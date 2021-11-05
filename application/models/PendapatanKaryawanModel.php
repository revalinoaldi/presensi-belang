<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendapatanKaryawanModel extends CI_Model {
	private $tbl = 'tbl_pendapatan_karyawan';

	public function show($where='')
	{
		$this->db->select('*');
		$this->db->from($this->tbl);
		if (@$where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}	

	public function update($where,$object)
	{
		$this->db->where($where);
		$this->db->update($this->tbl, $object);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file PendapatanKaryawanModel.php */
/* Location: ./application/models/PendapatanKaryawanModel.php */