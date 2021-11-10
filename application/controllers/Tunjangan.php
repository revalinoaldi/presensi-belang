<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tunjangan_model','tunjangan');
    }
    public function index()
    {
        $data = [
            'content' => 'pages/list_Tunjangan',
            'data' => $this->tunjangan->listing()
        ];
        $data['title'] = "E-Penggajian|Ikeda";
        
        $this->load->view('layout/main', $data);
        
    }

}

/* End of file Tunjangan.php */
/* Location: ./application/controllers/Tunjangan.php */