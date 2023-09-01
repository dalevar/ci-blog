<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	

	public function index()
	{
		$data['header'] = "Dashboard";


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/dashboard/index');
		$this->load->view('template/footer');
	}
}
