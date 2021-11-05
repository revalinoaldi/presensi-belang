<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
		$this->load->model('tunjangan_model','tunjangan');
		$this->load->model('Detil_tunjangan_model','detail');
	}

	public function index()
	{
		$jabatan = [];

		foreach ($this->api->getApi('Jabatan')['data'] as $key) {
			$id = ['id_jabatan' => $key['id']];
			$row = $this->detail->show($id)->result_array();
			
			foreach ($row as $val) {
				$key['detail'][] = $val;
			}
			$jabatan[] = $key;
		}

		$data = [
			'content' => 'pages/jabatan/list_jabatan',
			'data'=> $jabatan,
			'detail' => $this->detail->show()->result_array(),
			'tunjangan' => $this->tunjangan->listing()->result_array()
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
		
	}

	public function tambah()
	{
		$data = [
			'content' => 'pages/jabatan/form_jabatan',
			'data'=> $this->api->getApi('Jabatan'),
			'tunjangan' => $this->tunjangan->listing()->result_array()
		];
		$data['title'] = "E-Penggajian|Ikeda";
		$this->load->view('layout/main', $data, FALSE);
	}

	public function action($id='')
	{
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('tunj[]', '', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$alert = '<div class="alert alert-danger " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Error!</strong> '.validation_errors('<div class="error">', '</div>').'
			</div>';
			$this->session->set_flashdata('notif', $alert);

			redirect('Jabatan/tambah/'.$id,'refresh');
		} else {
			foreach ($this->input->post('tunj') as $key => $value) {
				$arr= [
					'id_jabatan'=>$this->input->post('jabatan'),
					'id_tunjangan'=>$value
				];
				$row = $this->detail->show($arr);
				if ($row->num_rows() < 1) {
					$this->detail->insert($arr);
				}
			}
			redirect('jabatan','refresh');
		}
	}

	public function delete()
	{
        $jsonArray = json_decode($this->input->raw_input_stream,true); 

		if (@$jsonArray) {
			$data = [
				'id_jabatan' => $jsonArray['jabatan'],
				'id_tunjangan' => $jsonArray['tunjangan']
			];
			$del = $this->detail->delete($data);
			if ($del) {
				$res = [
					'result' => true,
					'message' => 'Successful delete data'
				];
			}else{
				$res = [
					'result' => false,
					'message' => 'Error delete data'
				];
			}
		}else{
			$res = [
				'result' => false,
				'message' => 'Error delete data'
			];
		}
		echo json_encode($res);
	}
}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */