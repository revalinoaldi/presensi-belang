<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');

	}

	// Halaman Login
	public function index()
	{
		// validasi
		

		//end validasi
		$data = array('title' => 'Login Admin');
		$this->load->view('pages/login', $data, FALSE);	
	}

	public function ceklogin()
	{
		$this->form_validation->set_rules('username','Username','required',
			array('required' => '%s must be filled'));

		$this->form_validation->set_rules('password','Password','required',
			array('required' => '%s must be filled'));

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// proses ke simple login

			$cek= $this->user->login($username);
			if ($cek->num_rows()>0) {
				$row=$cek->row();
				if (password_verify($password,$row->password)) {
					$array = array(
						'id' => $row->id,
						'nama' => $row->nama,
						'email' => $row->email,
						'username' => $row->username,
						'avatar' => $row->avatar,
					);
					$this->session->set_flashdata('notif','sukses');
					
					$this->session->set_userdata( $array );
					redirect('dashboard','refresh');
				}else{
					$this->session->set_flashdata('notif','password anda salah');
					redirect('login','refresh');
				}
			}else{
				$this->session->set_flashdata('notif', 'username salah');
				redirect('login','refresh');
			}
		}else{
			$this->session->set_flashdata('notif', 'username dan parrword wajib di isi');
			redirect('login','refresh');
		}
	}
	//fungsi logout
	public function logout()
	{
		//ambil fungsi logout dari simple login
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	private function insert()
	{
		$array = array(
			'nama' => 'via', 
			'email' => 'viaardiani507@gmail.com',
			'username' => 'viaardiani507',
			'password' => password_hash('via12345',PASSWORD_BCRYPT),
			'avatar' => '',
		);

		$this->db->insert('user', $array);
		echo "<pre>";
		print_r ($this->db->affected_rows());
		echo "</pre>";
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */