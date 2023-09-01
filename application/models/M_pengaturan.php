<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
	public function get()
	{
		return $this->db->get_where('tbl_pengaturan', ['id' => 1])->row_array();
	}

	public function update($data)
	{
		return $this->db->update('tbl_pengaturan', $data, ['id' => 1]);
	}
}
