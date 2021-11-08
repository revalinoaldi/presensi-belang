<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//listing all user
	public function listing($where='') {

		$this->db->select('*');
		$this->db->from('tbl_jns_tunjangan');
		if (@$where) {
			$this->db->where($where);
		}
		$this->db->order_by('id_tunjangan', 'desc');
		 return $this->db->get();
	}


	// Tambah
	public function tambah($data)
	{
		$this->db->insert('tbl_jns_tunjangan',$data);
		if ($this->db->affected_rows()>0) {
			return true;
			# code...
		}
		else {
			return false;
		}
	}

	//Edit
	public function edit($data,$where)
	{
		$this->db->where($where);
		$this->db->update('tbl_jns_tunjangan', $data);
		if ($this->db->affected_rows()>0) {
			return true;
			# code...
		}
		else {
			return false;
		}
	}


	//Delete
	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('tbl_jns_tunjangan');
		if ($this->db->affected_rows()>0) {
			return true;
		}
		else {
			return false;
		}
	}

	// =================================================================== \\

	public function show($where='') {

		$this->db->select('*');
		$this->db->from('tbl_tunjangan_karyawan');
		if (@$where) {
			$this->db->where($where);
		}
		 return $this->db->get();
	}

	public function insert_tunjangan($insert)
	{
		$this->db->insert('tbl_tunjangan_karyawan', $insert);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file tbl_jns_tunjangan_model.php */
/* Location: ./application/models/tbl_jns_tunjangan_model.php */