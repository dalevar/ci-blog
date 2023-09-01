<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_postingan', 'postingan');
		$this->load->model('M_kategori', 'kategori');
	}

	public function index()
	{
		$data['postingan'] = $this->postingan->get();
		$data['kategori'] = $this->kategori->get();

		$data['header'] = "Berita & Postingan";
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/postingan/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_postingan', 'Nama Postingan', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('isi_postingan', 'Isi Postingan', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->kategori->get();

			$data['header'] = "Tambah Berita & Postingan";
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('admin/postingan/tambah', $data);
			$this->load->view('template/footer');
		} else {
			$namapostingan = $this->input->post('nama_postingan');
			$slug = str_replace(' ', '-', $namapostingan);
			$data = [
				'id_kategori' => $this->input->post('id_kategori'),
				'nama' => $this->input->post('nama_postingan'),
				'isi_postingan' => htmlspecialchars($this->input->post('isi_postingan'), true),
				'slug' => $slug,
				'tanggal_dibuat' => time()
			];
			$this->postingan->insert($data);
			$this->session->set_flashdata('pesan', 'Postingan berhasil ditambahkan');
			redirect('postingan');
		}
	}

	public function detail($id)
	{
		$data_kategori = $this->postingan->getById($id);
		$id_kategori = $data_kategori['id_kategori'];
		$data['kategori'] = $this->kategori->get_where($id_kategori);
		$data['postingan'] = $this->postingan->getById($id);

		$data['header'] = "Detail Berita & Postingan";
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/postingan/detail', $data);
		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$data['postingan'] = $this->postingan->getById($id);
		$data['kategori'] = $this->kategori->get();

		$data['header'] = "Edit Berita & Postingan";
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/postingan/edit', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_postingan', 'Nama Postingan', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('isi_postingan', 'Isi Postingan', 'trim|required');

		$id = $this->input->post('id');

		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->kategori->get();

			$this->session->set_flashdata('pesan', 'Postingan Gagal di edit');
			redirect('postingan/edit/' . $id);
		} else {
			$data = [
				'nama' => $this->input->post('nama_postingan'),
				'id_kategori' => $this->input->post('id_kategori'),
				'isi_postingan' => htmlspecialchars($this->input->post('isi_postingan'), true),
			];
			$this->postingan->update($id, $data);
			$this->session->set_flashdata('pesan', 'Postingan Berhasil di ubah');
			redirect('postingan');
		}
	}

	public function hapus($id)
	{
		$this->postingan->delete($id);
		$this->session->set_flashdata('pesan', 'Postingan Berhasil di Hapus');
		redirect('postingan');
	}
}
