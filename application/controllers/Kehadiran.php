<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
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
		$kehadiran_siswa = array();
		$today = date("Y-m-d");
		$res =  $this->db->query("SELECT * FROM `tbl_kehadiran` WHERE `tgl_kehadiran` = '" . $today . "'")->result_array();
		$this->data['today'] = $today;
		if (count($res) <= 0) {

			$this->data['title_web'] = 'Data Kehadiran Siswa ';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('kehadiran/kehadiran_view', $this->data);
			$this->load->view('footer_view', $this->data);
		} else {


			foreach ($res as $dd) {

				array_push($kehadiran_siswa, $dd['siswa_id']);
			}
			// var_dump($kehadiran_siswa);
			$all_id_siswa = "";
			for ($i = 0; $i < count($kehadiran_siswa); $i++) {
				$all_id_siswa .= $kehadiran_siswa[$i] . ",";
			}
			// $id_siswa = implode(",", $all_id_siswa);
			$id_siswa = substr($all_id_siswa, 0, strlen($all_id_siswa) - 1);
			// var_dump($id_siswa);
			// die();
			$res_siswa =  $this->db->query("SELECT * FROM `tbl_siswa` WHERE `id_siswa` IN (" . $id_siswa . ")  ")->result_array();

			// var_dump($all_id_siswa);
			// // var_dump($res_siswa);
			$this->data['siswa'] = $res_siswa;
			$this->data['title_web'] = 'Data Kehadiran Siswa ';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('kehadiran/kehadiran_view', $this->data);
			$this->load->view('footer_view', $this->data);
		}
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		// $this->data['siswa'] = $this->M_Admin->get_table('tbl_siswa');
		$today = date("Y-m-d");
		$this->data['today'] = $today;
		$this->data['title_web'] = 'Tambah Kehadiran ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kehadiran/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{

		$tanggal = htmlentities($this->input->post('tanggal', TRUE));
		$id_siswa = $_COOKIE['dataKehadiran'];



		$data = array(
			'id_kehadiran' => '',
			'tgl_kehadiran' => $tanggal,
			'siswa_id' => $id_siswa

		);

		$this->db->insert('tbl_kehadiran', $data);

		if ($this->$_SESSION['pesan'] == null) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Tambah kehadiran telah berhasil !</p>
				</div></div>');
		}
		redirect(base_url('kehadiran'));
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
		$nis = htmlentities($this->input->post('nis', TRUE));
		$nama = htmlentities($this->input->post('nama', TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$tempat_lahir = htmlentities($this->input->post('tempat_lahir', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));

		$dd = $this->db->query("SELECT * FROM tbl_siswa WHERE nis = '$nis'");


		$data = array(
			'id_siswa' => $id_siswa,
			'nis' => $nis,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $_POST['tgl_lahir'],
			'jenkel' => $jenkel,
			'alamat' => $alamat,
			'tgl_bergabung' => date('Y-m-d')
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
		$count =  $this->db->query("SELECT * FROM `tbl_pinjam` WHERE `anggota_id` = '" . $siswa[0]['nis'] . "'")->result_array();
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

	public function result()
	{
		
		$awal = $this->input->post('siswa_dari');
		$akhir = $this->input->post('siswa_sampai');
		// $awal = '0001';
		// $akhir = '0003';
		$limit = $akhir-$awal;
		$limit += 1;
		$res = $this->db->query("SELECT * FROM `tbl_siswa` WHERE `kode_anggota` >= '" . $awal . "' ORDER BY kode_anggota ASC LIMIT $limit ")->result_array();

		// var_dump($siswa_dari);
		// var_dump($siswa_dari[0]['id_siswa']);
		$result_siswa = array();
		foreach ($res as $dd) {

			$siswa = array(
				"id_siswa"		 => $dd['id_siswa'],
				"kode_anggota"   => $dd['kode_anggota'],
				"nama"        	 => $dd['nama']
			);
			$result_siswa[] = $siswa;
		}
		
		echo json_encode($result_siswa);
	}
	public function kehadiran_siswa()
	{


		$kehadiran_siswa = array();
		$today = date("Y-m-d");
		$res =  $this->db->query("SELECT * FROM `tbl_kehadiran` WHERE `tgl_kehadiran` = '" . $this->input->post('tanggal') . "'")->result_array();
		if (count($res) <= 0) {
		} else {


			foreach ($res as $dd) {

				array_push($kehadiran_siswa, $dd['siswa_id']);
			}

			$all_id_siswa = "";
			for ($i = 0; $i < count($kehadiran_siswa); $i++) {
				$all_id_siswa .= $kehadiran_siswa[$i] . ",";
			}
			$id_siswa = substr($all_id_siswa, 0, strlen($all_id_siswa) - 1);
			$res_siswa =  $this->db->query("SELECT * FROM `tbl_siswa` WHERE `id_siswa` IN (" . $id_siswa . ")  ")->result_array();
		}
		echo json_encode($res_siswa);
	}
}
