<?php
if (!function_exists('is_admin')) {
	function is_admin()
	{
		$CI = get_instance();
		if ($CI->session->level != 'admin') {
			redirect('mudik', 'refresh');
		}
	}
}


if (!function_exists('sisaSlotTiket')) {
	function sisaSlotTiket($id, $slot)
	{
		$CI = &get_instance();
		$CI->load->model('m_boking_tiket');
		$check = $CI->m_boking_tiket->getTiketId(['r.id' => $id, 'bk.status_boking' => 'valid'])->num_rows();
		$sisaTiket =  $slot - $check;
		return $sisaTiket;
	}
}
if (!function_exists('detailTiket')) {
	function detailTiket($id)
	{
		$CI = &get_instance();
		$CI->load->model('m_boking_tiket');
		$CI->load->model('m_rute');
		$data['rute'] = $CI->m_rute->editRute($id)->row_array();
		$data['tiket'] = $CI->m_boking_tiket->getTiketId(['r.id' => $id, 'bk.status_boking' => 'valid'])->result_array();
		return $data;
	}
}

if (!function_exists('jumlahTiketBoking')) {
	function jumlahTiketBoking($id)
	{
		$CI = &get_instance();
		$CI->load->model('m_boking_tiket');
		$check = $CI->m_boking_tiket->getTiketId(['bk.id' => $id])->num_rows();

		return $check;
	}
}
