<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
	}

	public function index()
	{

		$data = [
			'content' => 'pages/Users/List',
			'data'=> $this->user->listing()->result_array()
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

	public function action($id='')
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Users', 'trim|required');
		$this->form_validation->set_rules('uname', 'Username', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$alert = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Warning!</strong> Error Action! Please check your input requirement
			</div>';
			$this->session->set_flashdata('notif', $alert);
			redirect('Users','refresh');
		} else {
			$pass = $this->input->post('pass') ? htmlentities(htmlspecialchars($this->input->post('pass'))) : '';
			$arr = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('uname'),
				'password' => password_hash($pass,PASSWORD_BCRYPT)
			];

			if (!$id) {
				$act = $this->user->tambah($arr);
			}else{
				$act = $this->user->edit(['id' => $id], $arr);
			}

			if ($act) {
				$alert = '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> Success Action this process
				</div>';
				$this->session->set_flashdata('notif', $alert);
				redirect('Users','refresh');
			}else{
				$alert = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Warning!</strong> Error Action! 
				</div>';
				$this->session->set_flashdata('notif', $alert);
				redirect('Users','refresh');
			}
		}
	}

	public function deleteUser($id='')
	{
		if (@$id) {
			$i = ['id' => $id];
			$res = [
				'result' => true,
				'message' => "Success",
				'data' => $this->user->delete($i)
			];
		}else{
			$res = [
				'result' => false,
				'message' => "Gagal",
				'data' => []
			];
		}
		echo json_encode($res);
		
	}

	public function getUsers($id='')
	{
		if (@$id) {
			$i = ['id' => $id];
			$res = [
				'result' => true,
				'message' => "Success",
				'data' => $this->user->listing($i)->row_array()
			];
		}else{
			$res = [
				'result' => false,
				'message' => "Gagal",
				'data' => []
			];
		}

		echo json_encode($res);
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */