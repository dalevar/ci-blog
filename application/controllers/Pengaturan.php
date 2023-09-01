<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengaturan', 'pengaturan');
	}

	public function index()
	{
		$data['pengaturan'] = $this->pengaturan->get();

		$data['header'] = "Pengaturan";
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pengaturan/index', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$data = [
			'nama_blog' => $this->input->post('nama_blog'),
			'link_instagram' => $this->input->post('link_instagram'),
			'link_facebook' => $this->input->post('link_facebook'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp')
		];

		$this->pengaturan->update($data);
		$this->session->set_flashdata('pesan', 'Pengaturan berhasil diubah');
		redirect(base_url('pengaturan'));
	}

	public function updateLogo()
	{
		$config['upload_path'] = './assets/img/logo/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('logo')) {
			$error = $this->upload->display_errors();
			var_dump($error);
			die;
		} else {
			$img = $this->upload->data();
			$old_img = $this->pengaturan->get();
			$path = './assets/img/logo/' . $old_img['logo'];
			unlink($path);

			$data = [
				'logo' => $img['file_name']
			];
			$this->pengaturan->update($data);
			$this->session->set_flashdata('pesan', 'Logo Berhasil di ubah');
			redirect(base_url('pengaturan'));
		}
	}

	public function updateBanner()
	{
		$config['upload_path'] = './assets/img/banner/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('banner')) {
			$error = $this->upload->display_errors();
			var_dump($error);
			die;
		} else {
			$img = $this->upload->data();
			$old_img = $this->pengaturan->get();
			$path = './assets/img/banner/' . $old_img['banner'];
			unlink($path);

			$data = [
				'banner' => $img['file_name']
			];
			$this->pengaturan->update($data);
			$this->session->set_flashdata('pesan', 'Banner Berhasil di ubah');
			redirect(base_url('pengaturan'));
		}
	}
}
