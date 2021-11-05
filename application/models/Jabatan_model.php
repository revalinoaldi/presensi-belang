<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//listing all tunjngan
	public function listing() {

		$this->db->select('*');
		$this->db->from('tbl_jns_tunjangan');
		$this->db->order_by('id_tunjangan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	
	//detail user
	public function detail($id_tunjangan) 
	{

		$this->db->select('*');
		$this->db->from('tbl_jns_tunjangan');
		$this->db->where('id_tunjangan', $id_tunjangan);
		$this->db->order_by('id_tunjangan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tambah
	public function tambah($data)
	{
		$this->db->insert('tbl_jns_tunjangan',$data);
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_tunjangan', $data['id_tunjangan']);
		$this->db->update('tbl_jns_tunjangan', $data);
	}


	//Delete
	public function delete($data)
	{
		$this->db->where('id_tunjangan', $data['id_tunjangan']);
		$this->db->delete('tbl_jns_tunjangan', $data);
	}

}

/* End of file tbl_jns_tunjangan_model.php */
/* Location: ./application/models/User_model.php */