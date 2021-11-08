<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GajiModel extends CI_Model {
	private $tbl = 'tbl_gaji_kotor';
	private $view = 'v_gaji';

	public function show($where='')
	{
		$this->db->select('*');
		$this->db->from($this->view);
		if (@$where != null) {
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

/* End of file GajiModel.php */
/* Location: ./application/models/GajiModel.php */