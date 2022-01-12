<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moda_transportasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_moda_transportasi', 'moda');
	}
	public function index()
	{
		is_admin();
		$data['title'] = 'Master Moda Transportasi';
		$this->template->load('template/template_admin', 'admin/v_moda_transportasi', $data);
	}


	public function datatable()
	{
		$list = $this->moda->get_datatables();
		$data = array();
		foreach ($list as $s) {
			$row = array();
			$row[] = '';
			$row[] = $s->nama_transportasi;

			$row[] = '
            <a class="btn btn-sm btn-warning edit-moda" href="javascript:void(0)" title="Edit Kota" data-id=' . "'" . $s->id  . "'" . '><i class="fas fa-fw fa-edit"></i></a>
            <a href="javascript:void(0)" title="Hapus Kota" class="btn btn-sm btn-danger delete-moda"  data-id=' . "'" . $s->id  . "'" . '><i class="fa fa-trash"></i></a>';


			$data[] = $row;
		}

		$result = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->moda->count_all(),
			"recordsFiltered" => $this->moda->count_filtered(),
			"data" => $data,
		);


		echo json_encode($result);
		exit();
	}


	public function deleteModa($id)
	{
		$this->moda->deleteModa($id);
		echo 'success';
	}

	public function editModa($id)
	{
		$data = $this->moda->editModa($id)->result_array();
		echo json_encode($data);
	}

	public function storeModa()
	{

		$input = $this->input->post(null, false);
		if ($input['nama_moda'] == '') {
			echo 'error';
		} else {
			$data['nama_transportasi'] = $input['nama_moda'];
			$this->moda->insertModa($data);

			echo 'success';
		}
	}

	public function updateModa()
	{
		$input = $this->input->post(null, false);
		if ($input['nama_moda'] == '') {
			echo 'error';
		} else {
			$data['nama_transportasi'] = $input['nama_moda'];
			$this->moda->updateModa($input['id_moda'], $data);
			echo 'success';
		}
	}
}
