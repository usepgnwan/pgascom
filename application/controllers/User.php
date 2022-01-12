<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
	}
	public function index()
	{
		is_admin();
		$data['title'] = 'List User';
		$this->template->load('template/template_admin', 'admin/v_user', $data);
	}

	public function datatable()
	{
		$list = $this->user->get_datatables();
		$data = array();
		foreach ($list as $s) {
			$row = array();
			$row[] = '';
			$row[] = $s->nip;
			$row[] = $s->nama;
			$row[] = $s->email;
			$row[] = $s->alamat;


			$data[] = $row;
		}

		$result = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->user->count_all(),
			"recordsFiltered" => $this->user->count_filtered(),
			"data" => $data,
		);


		echo json_encode($result);
		exit();
	}
}
