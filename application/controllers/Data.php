<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
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
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
		$this->data['title_web'] = 'Data Buku';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/buku_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	public function jumlah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku GROUP BY title ORDER BY title ASC");
		$this->data['title_web'] = 'Data Jumlah Buku';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/jumlah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function bukudetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_buku', 'id_buku', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tbl_buku', 'id_buku', $this->uri->segment('3'));
			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();
		} else {
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="' . base_url('data') . '"</script>';
		}

		$this->data['title_web'] = 'Data Buku Detail';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function bukuedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_buku', 'id_buku', $this->uri->segment('3'));
		if ($count > 0) {

			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tbl_buku', 'id_buku', $this->uri->segment('3'));

			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();
		} else {
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="' . base_url('data') . '"</script>';
		}

		$this->data['title_web'] = 'Data Buku Edit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function bukutambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();


		$this->data['title_web'] = 'Tambah Buku';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}


	public function prosesbuku()
	{
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

		// hapus aksi form proses buku
		if (!empty($this->input->get('buku_id'))) {

			$buku = $this->M_Admin->get_tableid_edit('tbl_buku', 'id_buku', htmlentities($this->input->get('buku_id')));
			$bukuDel =  $this->db->query("SELECT * FROM `tbl_buku` WHERE `id_buku` = '" . $this->input->get('buku_id') . "'")->result_array();
			$count =  $this->db->query("SELECT * FROM `tbl_pinjam` WHERE `kode` = '" . $bukuDel[0]['kode_buku'] . "'")->result_array();

			if ((count($count)) > 0) {

				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
							<p> Gagal Hapus Buku ! Data Buku ada di table dipinjam / dikembalikan</p>
						</div></div>');
				}
			} else {

				$this->M_Admin->delete_table('tbl_buku', 'id_buku', $this->input->get('buku_id'));
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
							<p> Berhasil Hapus Buku !</p>
						</div></div>');
				}
			}
			redirect(base_url('data'));
		}

		// tambah aksi form proses buku
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$id_kategori = $post['kategori'];
			$count = $this->M_Admin->CountTableId('tbl_kategori', 'id_kategori', $id_kategori);
			if ($count > 0) {
				$query = $this->db->query("SELECT * FROM tbl_kategori WHERE id_kategori='$id_kategori'")->row();
			} // cek dulu apakah ada sudah ada kode di tabel.
			;
			$kode_kategori = $query->kode_kategori;
			$buku_id = $this->M_Admin->buat_kode('tbl_buku', 'BK', $id_kategori, $kode_kategori, 'kode_buku', 'ORDER BY kode_buku DESC LIMIT 1');
			$data = array(
				'kode_buku' => $buku_id,
				'id_kategori' => htmlentities($post['kategori']),
				'id_rak' => htmlentities($post['rak']),
				'isbn' => htmlentities($post['isbn']),
				'title'  => htmlentities($post['title']),
				'pengarang' => htmlentities($post['pengarang']),
				'penerbit' => htmlentities($post['penerbit']),
				'thn_buku' => htmlentities($post['thn']),
				'jml' => htmlentities($post['jml']),
				'tgl_masuk' => date('Y-m-d H:i:s')
			);


			$this->db->insert('tbl_buku', $data);
			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Tambah Buku Sukses !</p>
				</div></div>');
			}
			redirect(base_url('data'));
		}

		// edit aksi form proses buku
		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();

			$bukuEdit =  $this->db->query("SELECT * FROM `tbl_buku` WHERE `id_buku` = '" .$this->input->post('edit') . "'")->result_array();
			$count =  $this->db->query("SELECT * FROM `tbl_pinjam` WHERE `kode` = '" . $bukuEdit[0]['kode_buku'] . "'")->result_array();

			
			if ((count($count)) > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
							<p> Gagal Edit Buku ! Data Buku ada di table dipinjam / dikembalikan</p>
						</div></div>');
				}
			} else {


				if (($post['kategori'] != $post['id_kategori_old'])) {
					$id_kategori = $post['kategori'];
					$count = $this->M_Admin->CountTableId('tbl_kategori', 'id_kategori', $id_kategori);
					if ($count > 0) {
						$query = $this->db->query("SELECT *FROM tbl_kategori WHERE id_kategori='$id_kategori'")->row();
					}
					$kode_kategori = $query->kode_kategori;
					$buku_id = $this->M_Admin->buat_kode_edit('tbl_buku', 'BK', $id_kategori, $kode_kategori, 'kode_buku', 'ORDER BY kode_buku DESC LIMIT 1');
					$data = array(
						'kode_buku' => $buku_id,
						'id_kategori' => htmlentities($post['kategori']),
						'id_rak' => htmlentities($post['rak']),
						'isbn' => htmlentities($post['isbn']),
						'title'  => htmlentities($post['title']),
						'pengarang' => htmlentities($post['pengarang']),
						'penerbit' => htmlentities($post['penerbit']),
						'thn_buku' => htmlentities($post['thn']),
						'jml' => htmlentities($post['jml']),
						'tgl_masuk' => date('Y-m-d H:i:s')
					);
				} else {

					$data = array(
						'id_kategori' => htmlentities($post['kategori']),
						'id_rak' => htmlentities($post['rak']),
						'isbn' => htmlentities($post['isbn']),
						'title'  => htmlentities($post['title']),
						'pengarang' => htmlentities($post['pengarang']),
						'penerbit' => htmlentities($post['penerbit']),
						'thn_buku' => htmlentities($post['thn']),
						'jml' => htmlentities($post['jml']),
						'tgl_masuk' => date('Y-m-d H:i:s')
					);
				}

				$this->db->where('id_buku', htmlentities($post['edit']));
				$this->db->update('tbl_buku', $data);
				if ($this->$_SESSION['pesan'] == null) {

					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
						<p> Edit Buku Sukses !</p>
					</div></div>');
				}
			}
			redirect(base_url('data/bukuedit/' . $post['edit']));
		}
	}

	public function kategori()
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_kategori', 'id_kategori', $id);
			if ($count > 0) {
				$this->data['kat'] = $this->db->query("SELECT *FROM tbl_kategori WHERE id_kategori='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('data/kategori') . '"</script>';
			}
		}

		$this->data['title_web'] = 'Data Kategori ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kategori/kat_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	public function printbuku()
	{

		$this->data['title_web'] = 'Cetak Label Buku ';
		$this->load->view('buku/print_buku');
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
			$getKategoriExist = $this->db->query("SELECT * FROM tbl_kategori WHERE kode_kategori = '$kode_kategori'");

			if ($getKategoriExist->num_rows() > 0) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
				<p> Gagal Menambahkan Kategori ' . $data['nama_kategori'] . ' !, Kode Sudah Terpakai</p>
				</div></div>');
				redirect(base_url('data/kategori'));
			} else {
				$this->db->insert('tbl_kategori', $data);

				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Tambah Kategori Sukses !</p>
					</div></div>');
				}
			}
			redirect(base_url('data/kategori'));
		}

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'kode_kategori' => htmlentities($post['kode_kategori']),
				'nama_kategori' => htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori', htmlentities($post['edit']));
			$this->db->update('tbl_kategori', $data);

			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Edit Kategori Sukses !</p>
				</div></div>');
			}
			redirect(base_url('data/kategori'));
		}

		if (!empty($this->input->get('kat_id'))) {


			$count = $this->M_Admin->CountTableId('tbl_buku', 'id_kategori', $this->input->get('kat_id'));
			// print_r($count);
			if ($count > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
					<p> Hapus Kategori Gagal ! Kategori sedang digunakan</p>
					</div></div>');
				}
			} else {
				$this->db->where('id_kategori', $this->input->get('kat_id'));
				$this->db->delete('tbl_kategori');
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Hapus Kategori Sukses !</p>
					</div></div>');
				}
			}
			// die();
			redirect(base_url('data/kategori'));
		}
	}

	public function rak()
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_rak', 'id_rak', $id);
			if ($count > 0) {
				$this->data['rak'] = $this->db->query("SELECT *FROM tbl_rak WHERE id_rak='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('data/rak') . '"</script>';
			}
		}

		$this->data['title_web'] = 'Data Rak Buku ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('rak/rak_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function rakproses()
	{
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$data = array(
				'nama_rak' => htmlentities($post['rak']),
			);

			$this->db->insert('tbl_rak', $data);

			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Tambah Rak Buku Sukses !</p>
				</div></div>');
			}
			redirect(base_url('data/rak'));
		}

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'nama_rak' => htmlentities($post['rak']),
			);
			$this->db->where('id_rak', htmlentities($post['edit']));
			$this->db->update('tbl_rak', $data);

			if ($this->$_SESSION['pesan'] == null) {

				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Edit Rak Sukses !</p>
				</div></div>');
			}
			redirect(base_url('data/rak'));
		}

		if (!empty($this->input->get('rak_id'))) {
			$count = $this->M_Admin->CountTableId('tbl_buku', 'id_rak', $this->input->get('rak_id'));
			// print_r($count);
			if ($count > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
					<p> Hapus Rak Buku Gagal ! Rak sedang digunakan</p>
					</div></div>');
				}
			} else {

				$this->db->where('id_rak', $this->input->get('rak_id'));
				$this->db->delete('tbl_rak');

				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Hapus Rak Buku Sukses !</p>
					</div></div>');
				}
			}
			redirect(base_url('data/rak'));
		}
	}
}
