<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_boking_tiket extends CI_Model
{
	protected $table = 'tb_boking_tiket';

	private $column_order = array(null, 'r.slot', 'bk.id', 'u.nama', 'u.email', 'u.nip',  'bk.id_user', 'bk.token', 'tujuan.nama_kota', 'asal.nama_kota', 'moda.nama_transportasi'); //set column field database for datatable orderable

	private $column_search = array('r.slot', 'bk.id', 'u.nama', 'u.email', 'u.nip',  'bk.id_user', 'bk.token', 'tujuan.nama_kota', 'asal.nama_kota', 'moda.nama_transportasi'); //set column field database for datatable searchable 
	private $order = array('id' => 'desc');

	/* 
		SELECT r.*,u.nama,u.email,u.nip, bk.id, bk.id_user, bk.token,bk.token_verifikasi, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi FROM tb_rute r 
		join tb_kota asal ON asal.id = r.id_kota_asal 
		JOIN tb_kota tujuan on tujuan.id = r.id_kota_tujuan 
		JOIN tb_moda_transportasi moda on moda.id = r.id_mode_transportasi
        JOIN tb_boking_tiket bk on bk.id_rute = r.id
        JOIN tb_user u on u.id = bk.id_user;
*/
	// Datatable Function
	private function _get_datatables_query()
	{
		$this->db->select('r.*,u.nama,u.email,u.nip, bk.id id_boking, bk.id_user, bk.token,bk.token_verifikasi, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi, bk.created_at, bk.status_boking')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->join('tb_boking_tiket bk', 'bk.id_rute = r.id')
			->join('tb_user u', 'u.id = bk.id_user');
		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->select('r.*,u.nama,u.email,u.nip, bk.id, bk.id_user, bk.token, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->join('tb_boking_tiket bk', 'bk.id_rute = r.id')
			->join('tb_user u', 'u.id = bk.id_user');
		return $this->db->count_all_results();
	}
	//penutup datatabel

	public function getTiketId($where)
	{
		return	$this->db->select(' u.nama pemesan,u.email email_pemesan,u.nip, bk.id id_booking, bk.id_user, bk.token, bk.status_boking status_verifikasi, bk.created_at, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi, db.*')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->join('tb_boking_tiket bk', 'bk.id_rute = r.id')
			->join('tb_user u', 'u.id = bk.id_user')
			->join('tb_detail_boking db ', 'db.id_boking_tiket = bk.id')
			->where($where)
			->get();
	}

	public function getByid($id)
	{
		return	$this->db->select('r.*,u.nama pemesan,u.email email_pemesan,u.nip, bk.id id_booking, bk.id_user, bk.created_at, bk.token, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi, bk.status_boking')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->join('tb_boking_tiket bk', 'bk.id_rute = r.id')
			->join('tb_user u', 'u.id = bk.id_user')
			->where('bk.id', $id)
			->get();
	}

	public function updateBoking($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}
	public function checkId($like, $table)
	{
		return $this->db->select_max('id')->like('id', $like, 'after')->get($table);
	}

	public function storeBokingTiket($data, $table)
	{
		return	$this->db->insert($table, $data);
	}
}
