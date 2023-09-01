<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kategori', 'kategori');


		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['header'] = "Kategori";
		$data['kategori'] = $this->kategori->get();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kategori/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_kategori', 'Kategori', 'trim|required');

		if ($this->form_validation->run() == false) {
			redirect('kategori');
		} else {
			$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori'), TRUE),
			];
			$this->kategori->insert($data);
			$this->session->set_flashdata('pesan', 'Kategori berhasil ditambahkan');
			redirect('kategori');
		}
	}

	public function ubah($id)
	{
		$id = $this->uri->segment(3);

		if (!$id) {
			redirect('kategori');
		} else {
			$data['header'] = "Ubah Kategori";
			$data['kategori'] = $this->kategori->get_where($id);

			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('admin/kategori/ubah', $data);
			$this->load->view('template/footer');
		}
	}
	public function simpan_ubah()
	{
		$id = htmlspecialchars($this->input->post('id'), true);
		$data = [
			'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori'), true),
		];
		$this->kategori->update($id, $data);
		$this->session->set_flashdata('pesan', 'Kategori berhasil diubah');
		redirect('kategori');
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		if (!$id) {
			redirect('kategori');
		} else {
			$this->kategori->delete($id);
			$this->session->set_flashdata('pesan', 'Kategori berhasil dihapus');
			redirect('kategori');
		}
	}
}
