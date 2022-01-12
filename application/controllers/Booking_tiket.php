<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_boking_tiket', 'boking');
		$this->load->model('M_rute', 'rute');
	}
	public function index()
	{
		is_admin();
		$data['title'] = 'Booking Tiket';
		$this->template->load('template/template_admin', 'admin/v_booking_tiket', $data);
	}
	public function datatable()
	{
		$list = $this->boking->get_datatables();
		$data = array();
		foreach ($list as $s) {
			// r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi
			$row = array();
			// $row[] = '';
			$row[] = $s->id_boking;
			$row[] = $s->nama;
			$row[] = $s->email;
			$row[] = $s->nama_transportasi;
			$row[] = $s->kota_asal . ' </br>' . date('d M Y h:i:s', strtotime($s->tanggal_keberangkatan));
			$row[] = $s->kota_tujuan . ' </br>' . date('d M Y h:i:s', strtotime($s->tanggal_sampai));
			$row[] = date('d M Y h:i:s', strtotime($s->created_at));
			$row[] = jumlahTiketBoking($s->id_boking);
			// $row[] = $s->token;
			$check = '';
			// if (is_null($s->token_verifikasi)) {
			// 	$row[] = 'Token Belum Diisi';
			// } elseif (!is_null($s->token_verifikasi) && $s->token_verifikasi == $s->token) {
			$btn = '';
			if ($s->status_boking == 'proses') {
				$btn = ' <a class="btn btn-sm btn-warning verif-boking" href="javascript:void(0)" title="Verfikasi Semua Tiket" data-id=' . "'" . $s->id_boking  . "'" . '  data-idrute=' . "'" . $s->id  . "'" . '><i class="fas fa-fw fa-edit"></i></a>';
				$row[] = 'Terverifikasi, Menunggu Approval';
			} else if ($s->status_boking == 'valid') {
				$row[] = '<span class="badge badge-success">Tiket Aktif</span>';
				$btn = '';
			} else if ($s->status_boking == 'unvalid') {
				$row[] = 'Tiket Ditolak';
				$btn = ' <a class="btn btn-sm btn-warning verif-boking" href="javascript:void(0)" title="Verfikasi Semua Tiket" data-id=' . "'" . $s->id_boking  . "'" . '  data-idrute=' . "'" . $s->id  . "'" . '><i class="fas fa-fw fa-edit"></i></a>';
			}
			// } else {
			// 	$row[] = 'Token Salah';
			// }

			$row[] = '
			 <a class="btn btn-sm btn-primary lihat-boking" href="javascript:void(0)"data-id=' . "'" . $s->id_boking  . "'" . ' title="Lihat Semua Data Tiket"  ><i class="fas fa-fw fa-eye"></i></a> 
            ' . $btn;
			$data[] = $row;
		}

		$result = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->boking->count_all(),
			"recordsFiltered" => $this->boking->count_filtered(),
			"data" => $data,
		);


		echo json_encode($result);
		exit();
	}

	public function getDetailBoking($id)
	{
		$tiket = $this->boking->getByid($id)->row_array();
		$detail_tiket = $this->boking->getTiketId(['bk.id' => $id])->result();
		echo json_encode([
			'info' => $tiket,
			'detail_tiket' => $detail_tiket
		]);
	}

	public function verifikasiBokingTiket($id, $idrute)
	{
		$rute = $this->rute->editRute($idrute)->row_array();
		$jumlah_pesan = jumlahTiketBoking($id);
		$sisa = sisaSlotTiket($idrute, $rute['slot']);
		if ($sisa >= $jumlah_pesan) {
			$data['status_boking'] = 'valid';
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->boking->updateBoking($id, $data);
			echo 'success';
		} else if ($sisa < $jumlah_pesan) {
			echo 'habis';
		}
	}
}
