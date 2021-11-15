<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//listing all user
	public function listing($where='') {

		$this->db->select('*');
		$this->db->from('user');
		if (@$where) {
			$this->db->where($where);
		}
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query;
	}	
	//detail user
	public function detail($id_user) 
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id_user);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

		//login user
	public function login($username) 
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('user',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	//Edit
	public function edit($where,$data)
	{
		$this->db->where($where);
		$this->db->update('user', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}


	//Delete
	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('user');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */