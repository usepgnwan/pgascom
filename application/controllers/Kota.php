<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kota', 'kota');
	}
	public function index()
	{
		is_admin();
		$data['title'] = 'Master Kota';
		$this->template->load('template/template_admin', 'admin/v_kota', $data);
	}


	public function datatable()
	{
		$list = $this->kota->get_datatables();
		$data = array();
		foreach ($list as $s) {
			$row = array();
			$row[] = '';
			$row[] = $s->nama_kota;

			$row[] = '
            <a class="btn btn-sm btn-warning edit-kota" href="javascript:void(0)" title="Edit Kota" data-id=' . "'" . $s->id  . "'" . '><i class="fas fa-fw fa-edit"></i></a>
            <a href="javascript:void(0)" title="Hapus Kota" class="btn btn-sm btn-danger delete-kota"  data-id=' . "'" . $s->id  . "'" . '><i class="fa fa-trash"></i></a>';


			$data[] = $row;
		}

		$result = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->kota->count_all(),
			"recordsFiltered" => $this->kota->count_filtered(),
			"data" => $data,
		);


		echo json_encode($result);
		exit();
	}


	public function deleteKota($id)
	{
		$this->kota->deleteKota($id);
		echo 'success';
	}

	public function editKota($id)
	{
		$data = $this->kota->editKota($id)->result_array();
		echo json_encode($data);
	}

	public function storeKota()
	{
		$input = $this->input->post(null, false);
		if ($input['nama_kota'] == '') {
			echo 'error';
		} else {
			$data['nama_kota'] = $input['nama_kota'];
			$this->kota->insertKota($data);

			echo 'success';
		}
	}

	public function updateKota()
	{
		$input = $this->input->post(null, false);
		if ($input['nama_kota'] == '') {
			echo 'error';
		} else {
			$data['nama_kota'] = $input['nama_kota'];
			$this->kota->updateKota($input['id_kota'], $data);
			echo 'success';
		}
	}
}
