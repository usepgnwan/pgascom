<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
	}
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('auth/login');
		}
		is_admin();
		return $this->template->load('template/template_admin', 'test.php');
	}
	public function login()
	{
		return $this->load->view('template/login');
	}
}
