<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //Load data model user
        $this->CI->load->model('user_model');
	}

	//Fungsi Login

	public function login($username,$password)
	{
		$check= $this->CI->user_model->login($username,$password);
		// jika ada data user, maka create session login
		if($check){
			$id_user = $check->id_user;
			$nama = $check->nama;
			$akses_level = $check->akses_level;

			//create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);

			//redirect ke halaman admin yang di proteksi
			if($akses_level == "Accounting") {
				redirect(base_url('accounting/dashboard'),'refresh');
		}else{
			// kalau tidak ada(usernama atau password salah) maka login lagi
			$this->CI->session->set_flashdata('warning', 'Username or Password incorrect');
			redirect(base_url('login'),'refresh');
		}
	}

	//Fungsi cek login
	public function cek_login()
	{

		//memeriksa apakah session sudah ada atau belum, jika belum maka ke halaman login
		if($this->CI->session->userdata('username') == ""){

			$this->CI->session->set_flashdata('warning', 'You are not login');
			redirect(base_url('login'),'refresh');			
		}

	}

	//Fungsi Logout
	public function logout()
	{
		//membuang semua session yang telah si set saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');

		//setelah session di unset maka redirect ke login
		$this->CI->session->set_flashdata('success', 'You have successfully logged out');
		redirect(base_url('login'),'refresh');

	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
