<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
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
		$this->data['alat'] =  $this->db->query("SELECT * FROM tbl_alat ORDER BY kode_alat");
		$this->data['title_web'] = 'Data Alat';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('alat/alat_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	public function jumlah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['alat'] =  $this->db->query("SELECT * FROM tbl_alat GROUP BY nama_alat ORDER BY nama_alat ASC");
		$this->data['title_web'] = 'Data Jumlah Alat';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('alat/jumlah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function alatdetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_alat', 'id_alat', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['alat'] = $this->M_Admin->get_tableid_edit('tbl_alat', 'id_alat', $this->uri->segment('3'));
			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori_alat ORDER BY id_kategori DESC")->result_array();
		} else {
			echo '<script>alert("ALAT TIDAK DITEMUKAN");window.location="' . base_url('data') . '"</script>';
		}

		$this->data['title_web'] = 'Data Alat Detail';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('alat/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function alatedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_alat', 'id_alat', $this->uri->segment('3'));
		if ($count > 0) {

			$this->data['alat'] = $this->M_Admin->get_tableid_edit('tbl_alat', 'id_alat', $this->uri->segment('3'));

			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori_alat ORDER BY id_kategori DESC")->result_array();
		} else {
			echo '<script>alert("ALAT TIDAK DITEMUKAN");window.location="' . base_url('data') . '"</script>';
		}

		$this->data['title_web'] = 'Data Alat Edit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('alat/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function alattambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori_alat ORDER BY id_kategori DESC")->result_array();


		$this->data['title_web'] = 'Tambah alat';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('alat/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}


	public function prosesalat()
	{
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

		// hapus aksi form proses alat
		if (!empty($this->input->get('alat_id'))) {

			$alat = $this->M_Admin->get_tableid_edit('tbl_alat', 'id_alat', htmlentities($this->input->get('alat_id')));
			$alatDel =  $this->db->query("SELECT * FROM `tbl_alat` WHERE `id_alat` = '" . $this->input->get('alat_id') . "'")->result_array();
			$count =  $this->db->query("SELECT * FROM `tbl_pinjam_alat` WHERE `kode` = '" . $alatDel[0]['kode_alat'] . "'")->result_array();

			if ((count($count)) > 0) {

				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
							<p> Gagal Hapus Alat ! Data Alat ada di table dipinjam / dikembalikan</p>
						</div></div>');
				}
			} else {

				$this->M_Admin->delete_table('tbl_alat', 'id_alat', $this->input->get('alat_id'));
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
						<p> Berhasil Hapus Alat !</p>
					</div></div>');
				}
			}
			redirect(base_url('alat'));
		}

		// tambah aksi form proses alat
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$id_kategori = $post['kategori'];
			$count = $this->M_Admin->CountTableId('tbl_kategori_alat', 'id_kategori', $id_kategori);
			if ($count > 0) {
				$query = $this->db->query("SELECT * FROM tbl_kategori_alat WHERE id_kategori='$id_kategori'")->row();
			} // cek dulu apakah ada sudah ada kode di tabel.

			$kode_kategori = $query->kode_kategori;
			$alat_id = $this->M_Admin->buat_kode_alat('tbl_alat', 'AP', $id_kategori, $kode_kategori, 'kode_alat', 'ORDER BY kode_alat DESC LIMIT 1');
			$data = array(
				'kode_alat' => $alat_id,
				'id_kategori' => htmlentities($post['kategori']),
				'nama_alat'  => htmlentities($post['title']),
				'jumlah' => htmlentities($post['jml']),
				'kondisi' => htmlentities($post['kondisi']),
				'tgl_masuk' => date('Y-m-d H:i:s')
			);


			$this->db->insert('tbl_alat', $data);
			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Tambah Alat Sukses !</p>
				</div></div>');
			}
			redirect(base_url('alat'));
		}

		// edit aksi form proses alat
		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();

			$alatEdit =  $this->db->query("SELECT * FROM `tbl_alat` WHERE `id_alat` = '" . $this->input->post('edit') . "'")->result_array();
			$count =  $this->db->query("SELECT * FROM `tbl_pinjam_alat` WHERE `kode` = '" . $alatEdit[0]['kode_alat'] . "'")->result_array();


			if ((count($count)) > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
							<p> Gagal Edit Alat ! Data Alat ada di table dipinjam / dikembalikan</p>
						</div></div>');
				}
			} else {


				if (($post['kategori'] != $post['id_kategori_old'])) {
					$id_kategori = $post['kategori'];
					$count = $this->M_Admin->CountTableId('tbl_kategori_alat', 'id_kategori', $id_kategori);
					if ($count > 0) {
						$query = $this->db->query("SELECT *FROM tbl_kategori_alat WHERE id_kategori='$id_kategori'")->row();
					}
					$kode_kategori = $query->kode_kategori;
					$alat_id = $this->M_Admin->buat_kode_edit_alat('tbl_alat', 'AP', $id_kategori, $kode_kategori, 'kode_alat', 'ORDER BY kode_alat DESC LIMIT 1');
					$data = array(
						'kode_alat' => $alat_id,
						'id_kategori' => htmlentities($post['kategori']),
						'nama_alat'  => htmlentities($post['title']),
						'kondisi' => htmlentities($post['kondisi']),
						'tgl_masuk' => date('Y-m-d H:i:s')
					);
				} else {

					$data = array(
						'id_kategori' => htmlentities($post['kategori']),
						'nama_alat'  => htmlentities($post['title']),
						'kondisi' => htmlentities($post['kondisi']),
						'tgl_masuk' => date('Y-m-d H:i:s')
					);
				}

				$this->db->where('id_alat', htmlentities($post['edit']));
				$this->db->update('tbl_alat', $data);
				if ($this->$_SESSION['pesan'] == null) {

					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
						<p> Edit Alat Sukses !</p>
					</div></div>');
				}
			}
			redirect(base_url('alat/alatedit/' . $post['edit']));
		}
	}

	public function kategori()
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori_alat ORDER BY id_kategori DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_kategori_alat', 'id_kategori', $id);
			if ($count > 0) {
				$this->data['kat'] = $this->db->query("SELECT *FROM tbl_kategori_alat WHERE id_kategori='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('alat/kategori') . '"</script>';
			}
		}

		$this->data['title_web'] = 'Data Kategori Alat';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kategori_alat/kat_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	public function printalat()
	{

		$this->data['title_web'] = 'Cetak Label Alat ';
		$this->load->view('alat/print_alat');
	}

	public function katproses()
	{
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$data = array(
				'kode_kategori' => htmlentities($post['kode_kategori']),
				'nama_kategori' => htmlentities($post['kategori'])
			);
			$kode_kategori = $data['kode_kategori'];
			$getKategoriExist = $this->db->query("SELECT * FROM tbl_kategori_alat WHERE kode_kategori = '$kode_kategori'");

			if ($getKategoriExist->num_rows() > 0) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
				<p> Gagal Menambahkan Kategori ' . $data['nama_kategori'] . ' !, Kode Sudah Terpakai</p>
				</div></div>');
				redirect(base_url('alat/kategori'));
			} else {
				$this->db->insert('tbl_kategori_alat', $data);

				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Tambah Kategori Sukses !</p>
					</div></div>');
				}
			}
			redirect(base_url('alat/kategori'));
		}

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'kode_kategori' => htmlentities($post['kode_kategori']),
				'nama_kategori' => htmlentities($post['kategori']),
			);



			$this->db->where('id_kategori', htmlentities($post['edit']));
			$this->db->update('tbl_kategori_alat', $data);

			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Kategori Sukses !</p>
					</div></div>');
			}

			redirect(base_url('alat/kategori'));
		}

		if (!empty($this->input->get('kat_id'))) {


			$count = $this->M_Admin->CountTableId('tbl_alat', 'id_kategori', $this->input->get('kat_id'));
			// print_r($count);
			if ($count > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
					<p> Hapus Kategori Gagal ! Kategori sedang digunakan</p>
					</div></div>');
				}
			} else {
				$this->db->where('id_kategori', $this->input->get('kat_id'));
				$this->db->delete('tbl_kategori_Alat');
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Hapus Kategori Sukses !</p>
					</div></div>');
				}
			}
			// die();
			redirect(base_url('alat/kategori'));
		}
	}
}
