<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	//listing all user
	public function listing() {

		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
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
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('user', $data);
	}


	//Delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('user', $data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */