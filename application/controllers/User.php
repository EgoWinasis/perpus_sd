<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		// $this->data['user'] = $this->M_Admin->get_table('tbl_siswa');
		$this->data['user'] =  $this->db->query("SELECT * FROM tbl_siswa ORDER BY kode_anggota")->result_array();

		$this->data['title_web'] = 'Data Siswa ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/user_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('tbl_login');

		$this->data['title_web'] = 'Tambah Siswa ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{

		$nama = htmlentities($this->input->post('nama', TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$kode_anggota = $this->M_Admin->buat_kode_siswa('tbl_siswa', 'ORDER BY kode_anggota DESC LIMIT 1');

		$data = array(
			'id_siswa' => '',
			'kode_anggota' => $kode_anggota,
			'nama' => $nama,
			'jenkel' => $jenkel,
			'tgl_bergabung' => date('Y-m-d')
		);
		$this->db->insert('tbl_siswa', $data);

		if ($this->$_SESSION['pesan'] == null) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Daftar Siswa telah berhasil !</p>
				</div></div>');
		}
		redirect(base_url('user'));
	}

	public function edit()
	{
		if ($this->session->userdata('level') == 'Petugas') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_siswa', 'id_siswa', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_siswa', 'id_siswa', $this->uri->segment('3'));
			} else {
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
			}
		}
		$this->data['title_web'] = 'Edit Siswa ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function print()
	{
		// $test = "asa";
		// return $test;


		$this->data['title_web'] = 'Cetak Kartu Siswa ';
		$this->load->view('user/print');
	}

	public function detail()
	{
		$test = "asa";
		return $test;

		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_siswa', 'id_siswa', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_siswa', 'id_siswa', $this->uri->segment('3'));
		} else {
			echo '<script>alert("SISWA TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
		}

		$this->data['title_web'] = 'Print Kartu Siswa ';
		$this->load->view('user/detail', $this->data);
	}

	public function upd()
	{
		$id_siswa = htmlentities($this->input->post('id_siswa', TRUE));
		$nama = htmlentities($this->input->post('nama', TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$data = array(
			'nama' => $nama,
			'jenkel' => $jenkel
		);
		$this->M_Admin->update_table('tbl_siswa', 'id_siswa', $id_siswa, $data);
		if ($this->$_SESSION['pesan'] == null) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update Siswa : ' . $nama . ' !</p>
					</div></div>');
		}
		redirect(base_url('user'));
	}
	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		}

		$siswa =  $this->db->query("SELECT * FROM `tbl_siswa` WHERE `id_siswa` = '" . $this->uri->segment('3') . "'")->result_array();
		$count =  $this->db->query("SELECT * FROM `tbl_pinjam` WHERE `anggota_id` = '" . $siswa[0]['kode_anggota'] . "'")->result_array();
		if ((count($count)) > 0) {

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
			<p> Gagal Hapus Siswa ! Data siswa ada di table pinjam / pengembalian</p>
			</div></div>');
		} else {
			$this->M_Admin->delete_table('tbl_siswa', 'id_siswa', $this->uri->segment('3'));

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Berhasil Hapus Siswa !</p>
			</div></div>');
		}
		// die();
		redirect(base_url('user'));
	}
}
