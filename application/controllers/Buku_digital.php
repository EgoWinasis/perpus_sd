<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_digital extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_perpus_digital') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

	}

	public function index()
	{
		$this->data['ses_dig_id'] = $this->session->userdata('ses_dig_id');
		$this->data['kode_anggota'] = $this->session->userdata('kode_anggota');
		$this->data['nama_siswa'] = $this->session->userdata('nama');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku_digital ORDER BY title ")->result_array();
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY nama_kategori")->result_array();

		$width = $_COOKIE['width'];

		if($width < 800){
			$this->load->view('buku_digital/digital_view_mobile', $this->data);
		}
		else if ($width >= 800 && $width <= 1000) {
			$this->load->view('buku_digital/digital_view_tab', $this->data);
		}else{
			$this->load->view('buku_digital/digital_view', $this->data);
		}
	}
	public function read()
	{
		$id = $this->uri->segment('3');

		$this->data['ses_dig_id'] = $this->session->userdata('ses_dig_id');
		$this->data['kode_anggota'] = $this->session->userdata('kode_anggota');
		$this->data['nama_siswa'] = $this->session->userdata('nama');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku_digital WHERE id_buku = " . $id . " ORDER BY title")->result_array();

		$pinjamBuku = array(
			'id_siswa' => $this->data['ses_dig_id'],
			'id_buku' => $this->data['buku'][0]['id_buku'],
			'tgl_baca' => date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_pinjam_digital', $pinjamBuku);
		$this->load->view('buku_digital/read_view', $this->data);
	}
	public function search()
	{
		$text =  $this->input->get('s', TRUE);

		$this->data['ses_dig_id'] = $this->session->userdata('ses_dig_id');
		$this->data['kode_anggota'] = $this->session->userdata('kode_anggota');
		$this->data['nama_siswa'] = $this->session->userdata('nama');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku_digital WHERE title LIKE '%" . $text . "%' ORDER BY title")->result_array();
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY nama_kategori")->result_array();
		
		$width = $_COOKIE['width'];

		if($width < 800){
			$this->load->view('buku_digital/digital_view_mobile', $this->data);
		}
		else if ($width >= 800 && $width <= 1000) {
			$this->load->view('buku_digital/digital_view_tab', $this->data);
		}else{
			$this->load->view('buku_digital/digital_view', $this->data);
		}
	}
	public function kategori()
	{
		$kat =  $this->input->get('k', TRUE);

		$this->data['ses_dig_id'] = $this->session->userdata('ses_dig_id');
		$this->data['kode_anggota'] = $this->session->userdata('kode_anggota');
		$this->data['nama_siswa'] = $this->session->userdata('nama');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku_digital WHERE id_kategori = " . $kat . " ORDER BY title")->result_array();
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY nama_kategori")->result_array();
		$width = $_COOKIE['width'];

		if($width < 800){
			$this->load->view('buku_digital/digital_view_mobile', $this->data);
		}
		else if ($width >= 800 && $width <= 1000) {
			$this->load->view('buku_digital/digital_view_tab', $this->data);
		}else{
			$this->load->view('buku_digital/digital_view', $this->data);
		}
	}

}
