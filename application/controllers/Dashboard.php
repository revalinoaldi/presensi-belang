<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
	}

	public function index()
	{
		$data = [
			'emp' => $this->api->getApi('Employee')['data'],
			'jabatan' => $this->api->getApi('Jabatan')['data'],
			'content' => 'pages/dashboard'
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

	public function form()
	{
		$data = [
			'content' => 'pages/form_profile'
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */