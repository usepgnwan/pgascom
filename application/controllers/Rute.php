<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rute extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_moda_transportasi', 'moda');
		$this->load->model('M_kota', 'kota');
		$this->load->model('M_rute', 'rute');
	}
	public function index()
	{
		is_admin();
		$data['title'] = 'Rute Mudik';
		$data['transportasi'] = $this->moda->getAllData()->result();
		$data['kota'] = $this->kota->getAllData()->result();
		$this->template->load('template/template_admin', 'admin/v_rute', $data);
	}

	public function datatable()
	{
		$list = $this->rute->get_datatables();
		$data = array();
		foreach ($list as $s) {
			// r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi
			$row = array();
			$row[] = '';
			$row[] = $s->kota_asal;
			$row[] = $s->kota_tujuan;
			$row[] = $s->nama_transportasi;
			$row[] = date('d M Y h:i:s', strtotime($s->tanggal_keberangkatan));
			$row[] = date('d M Y h:i:s', strtotime($s->tanggal_sampai));
			$row[] = $s->slot;
			$row[] = sisaSlotTiket($s->id, $s->slot);;

			$row[] = '
			 <a class="btn btn-sm btn-primary" href="' . base_url('rute/details_tiket_acc/') . $s->id . '" title="Lihat Semua Slot / Tiket Aktif"  ><i class="fas fa-fw fa-eye"></i></a>
            <a class="btn btn-sm btn-warning edit-rute" href="javascript:void(0)" title="Edit Rute" data-id=' . "'" . $s->id  . "'" . '><i class="fas fa-fw fa-edit"></i></a>
            <a href="javascript:void(0)" title="Hapus Rute" class="btn btn-sm btn-danger delete-rute"  data-id=' . "'" . $s->id  . "'" . '><i class="fa fa-trash"></i></a>';


			$data[] = $row;
		}

		$result = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->rute->count_all(),
			"recordsFiltered" => $this->rute->count_filtered(),
			"data" => $data,
		);


		echo json_encode($result);
		exit();
	}
	public function deleteRute($id)
	{
		$this->rute->deleteRute($id);
		echo 'success';
	}
	public function editRute($id)
	{
		$data = $this->rute->editRute($id)->row_array();
		echo json_encode($data);
	}
	public function storeRute()
	{
		$input = $this->input->post(null, false);
		$input = $this->input->post(null, false);
		if (
			$input['nama_transportasi'] == '0' || $input['kota_asal'] == '0' || $input['kota_tujuan'] == '0' || $input['jam_keberangkatan'] == '' || $input['jam_sampai'] == ''
		) {
			echo 'error';
		} else {
			$data = [
				'id_mode_transportasi' => $input['nama_transportasi'],
				'id_kota_asal' => $input['kota_asal'],
				'id_kota_tujuan' => $input['kota_tujuan'],
				'tanggal_keberangkatan' => date('Y-m-d h:i:s', strtotime($input['jam_keberangkatan'])),
				'tanggal_sampai' => date('Y-m-d h:i:s', strtotime($input['jam_sampai'])),
				'slot' => $input['slot'],
			];
			// echo json_encode($data);
			$this->rute->insertRute($data);
			echo 'success';
		}
	}

	public function updateRute()
	{
		$input = $this->input->post(null, false);
		if (
			$input['nama_transportasi'] == '0' || $input['kota_asal'] == '0' || $input['kota_tujuan'] == '0' || $input['jam_keberangkatan'] == '' || $input['jam_sampai'] == ''
		) {
			echo 'error';
		} else {
			$data = [
				'id_mode_transportasi' => $input['nama_transportasi'],
				'id_kota_asal' => $input['kota_asal'],
				'id_kota_tujuan' => $input['kota_tujuan'],
				'tanggal_keberangkatan' => date('Y-m-d h:i:s', strtotime($input['jam_keberangkatan'])),
				'tanggal_sampai' => date('Y-m-d h:i:s', strtotime($input['jam_sampai'])),
				'slot' => $input['slot'],
			];
			$this->rute->updateRute($input['id_rute'], $data);
			echo 'success';
		}
	}

	public function details_tiket_acc($id)
	{
		$data = detailTiket($id);
		$data['title'] = 'Detail Tiket Terverifikasi / Aktif';
		$this->template->load('template/template_admin',  'admin/v_detail_tiket_rute', $data);
		// echo json_encode($data);
	}
}
