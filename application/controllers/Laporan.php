<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$data = [
			'content' => 'pages/Gaji/daftargaji'
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */