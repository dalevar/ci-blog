<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_postingan extends CI_Model
{
	public function insert($data)
	{
		return $this->db->insert('tbl_postingan', $data);
	}

	public function get()
	{
		return $this->db->get('tbl_postingan')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tbl_postingan', ['id' => $id])->row_array();
	}

	public function update($id, $data)
	{
		return $this->db->update('tbl_postingan', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('tbl_postingan', ['id' => $id]);
	}
}
