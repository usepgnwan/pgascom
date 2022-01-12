<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mudik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rute', 'rute');
		$this->load->model('M_boking_tiket', 'boking');
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
		// echo json_encode($data['rute']);
		// die;
		$this->load->view('template/template_user',  $data);
	}


	public function booking_tiket()
	{
		$input = $this->input->post(null, false);
		if ($this->session->logged_in) {
			if ($input) {
				$data['id_rute'] = $input['id_rute'];
				$data['jumlah_tiket'] = $input['jumlah_tiket'];
				$data['rute']  = $this->rute->editRute($input['id_rute'])->row_array();
				// echo json_encode($r);
				// die;
				$this->load->view('user/v_booking', $data);
			} else {
				redirect('mudik', 'refresh');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Lakukan login sebelum booking tiket');
			redirect('auth/login', 'refresh');
		}
	}

	public function store_booking_tiket()
	{
		$input = $this->input->post(null, false);

		$prefix = "BTKT-";
		$check = $this->boking->checkId($prefix, 'tb_boking_tiket')->row_array();
		// 'BTKT-00001'
		$id = '';
		if ($check['id'] == null) {
			$id = $prefix . "00001";
		} else {
			$nourut = substr($check['id'], 5, 10);
			$nourut++;
			$id = $prefix . sprintf("%05s", $nourut);
		}
		$token = bin2hex(random_bytes(4));

		$data = [
			'id' => $id,
			'id_rute' => $input['id_rute'],
			'id_user' => $input['iduser'],
			'token' => $token,
			'created_at' => date("Y-m-d h:i:s"),
			'updated_at' => date("Y-m-d h:i:s"),
			'status_boking' => 'proses',
		];
		$this->boking->storeBokingTiket($data, 'tb_boking_tiket');
		// echo $id;
		// echo json_encode($data);
		// echo json_encode($input);

		for ($i = 0; $i < count($input['nama']); $i++) {
			// tiket
			// $idtkt = "TKT-" .  str_replace(".", "", microtime(true));
			$idtkt = "TKT-" .  time() . $i . mt_rand(100, 999);
			$dataTiket['id'] = $idtkt;
			$dataTiket['nama'] = $input['nama'][$i];
			$dataTiket['jenis_kelamin'] = $input['jenis_kelamin'][$i];
			$dataTiket['alamat'] = $input['alamat'][$i];
			$dataTiket['status_tiket'] = $input['status_tiket'][$i];
			$dataTiket['id_boking_tiket'] = $id;
			// echo json_encode($dataTiket); 
			$this->boking->storeBokingTiket($dataTiket, 'tb_detail_boking');
		}
		// redirect('mudik/success_boking/' . $id, 'refresh');
		$this->session->set_flashdata('success_msg', 'Tiket boking anda berhasil dibuat dengan NO-Booking : ' . $id);
		redirect('mudik/list_tiket_boking', 'refresh');
	}

	public function list_tiket_boking()
	{
		if ($this->session->logged_in) {
			$data['tiket'] = $this->boking->getTiketId(['u.id' => $this->session->id])->result_array();
			// echo json_encode($data);
			// die;
			$this->load->view('user/v_list_tiket', $data);
		} else {

			$this->session->set_flashdata('success_msg', 'Lakukan login sebelum booking tiket');
			redirect('auth/login', 'refresh');
		}
	}
}
