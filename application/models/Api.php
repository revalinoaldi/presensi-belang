<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Model {

	public function getApi($url, $data='')
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,'http://api-presensi.firalcreative.my.id/'.$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);

		$arr = [
			'x-key: api-secret-key-presensi',
			'Content-Type: application/json'
		];

		if (@$data) {
			$arr[] = 'data-get:'.json_encode($data);
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER,$arr);

		$output = curl_exec($ch);
		curl_close ($ch);
		return json_decode($output, true);
	}

}

/* End of file Api.php */
/* Location: ./application/models/Api.php */