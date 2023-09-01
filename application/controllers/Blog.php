<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_blog', 'blog');
		$this->load->helper('text');
	}

	public function index()
	{
		$data['postingan'] = $this->blog->get();
		$data['kategori'] = $this->blog->getAllCategory();
		$data['title'] = "Blog";
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('template/blog_footer');
	}

	public function baca($slug)
	{
		$data['postingan'] = $this->blog->getBySlug($slug);
		$data['kategori'] = $this->getCategory($data['postingan']['id_kategori']);
		$data['allkategori'] = $this->blog->getAllCategory();

		$data['title'] = "Blog";
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/detail', $data);
		$this->load->view('template/blog_footer');
	}

	public function tentang()
	{
		$data['title'] = "Blog";
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/about', $data);
		$this->load->view('template/blog_footer');
	}

	public function kontak()
	{
		$data['title'] = "Blog";
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/contact', $data);
		$this->load->view('template/blog_footer');
	}

	public function getCategory($id)
	{
		$data = $this->blog->getCategory($id);
		return $data['nama_kategori'];
	}

	public function kategori()
	{
		$nama_kategori = $this->input->get('filter');
		$kategori = $this->blog->getCategoryByName($nama_kategori);
		$data['postingan'] = $this->blog->getBlogByCategory($kategori['id']);
		$data['kategori'] = $this->blog->getAllCategory();
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('template/blog_footer');
	}

	public function cari()
	{
		$keyword = $this->input->get('keyword');
		$data['postingan'] = $this->blog->search($keyword);
		$data['kategori'] = $this->blog->getAllCategory();

		$data['title'] = "Blog";
		$this->load->view('template/blog_header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('template/blog_footer');
	}
}
