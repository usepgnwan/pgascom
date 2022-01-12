<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_rute extends CI_Model
{
	protected $table = 'tb_rute';

	private $column_order = array(null, 'r.slot', 'tujuan.nama_kota', 'asal.nama_kota', 'moda.nama_transportasi'); //set column field database for datatable orderable
	private $column_search = array('r.slot', 'tujuan.nama_kota', 'asal.nama_kota', 'moda.nama_transportasi'); //set column field database for datatable searchable 
	private $order = array('id' => 'desc');


	// Datatable Function
	private function _get_datatables_query()
	{
		$this->db->select('r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi');
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
		$this->db->select('r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi');
		return $this->db->count_all_results();
	}
	//penutup datatabel

	public function getAllData()
	{
		/*
		SELECT r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi FROM tb_rute r 
		join tb_kota asal ON asal.id = r.id_kota_asal 
		JOIN tb_kota tujuan on tujuan.id = r.id_kota_tujuan 
		JOIN tb_moda_transportasi moda on moda.id = r.id_mode_transportasi;
		*/
		return $this->db->select('r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->get();
	}
	public function insertRute($data)
	{
		return $this->db->insert($this->table, $data);
	}
	public function deleteRute($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function editRute($id)
	{
		return $this->db->select('r.*, asal.nama_kota kota_asal, tujuan.nama_kota kota_tujuan, moda.nama_transportasi')
			->from('tb_rute r ', '')
			->join('tb_kota asal', 'asal.id = r.id_kota_asal')
			->join('tb_kota tujuan', 'tujuan.id = r.id_kota_tujuan ')
			->join('tb_moda_transportasi moda', 'moda.id = r.id_mode_transportasi')
			->where('r.id', $id)
			->get();
	}
	public function updateRute($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}
}
