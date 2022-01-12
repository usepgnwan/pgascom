<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kota extends CI_Model
{


	protected $table = 'tb_kota';

	private $column_order = array(null, 'nama_kota'); //set column field database for datatable orderable
	private $column_search = array('nama_kota'); //set column field database for datatable searchable 
	private $order = array('id' => 'desc');


	// Datatable Function
	private function _get_datatables_query()
	{
		$this->db->from($this->table);
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//penutup datatabel


	public function deleteKota($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function editKota($id)
	{
		$this->db->from($this->table)->where('id', $id);
		return $this->db->get();
	}
	public function insertKota($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function updateKota($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function getAllData()
	{
		return $this->db->from($this->table)->get();
	}
}
