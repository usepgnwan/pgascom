<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mudik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rute', 'rute');
	}
	public function index()
	{
		$url = 'https://api.covid19api.com/total/country/indonesia';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		$output = json_decode(
			curl_exec($ch),
			true
		);
		curl_close($ch);
		$info = end($output);
		$data['confirm'] = $info['Confirmed'];
		$data['death'] = $info['Deaths'];
		$data['recovered'] = $info['Recovered'];
		$data['active'] = $info['Active'];
		// $data['confirm'] = 0;
		// $data['death'] = 0;
		// $data['recovered'] = 0;
		// $data['active'] = 0;
		$data['rute'] = $this->rute->getAllData()->result_array();
		var_dump($data['rute']);
		die;
		$this->template->load('template/template_user', 'test.php', $data);
	}
}
