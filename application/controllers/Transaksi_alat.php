<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_alat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->library(array('cart'));
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->data['title_web'] = 'Data Pinjam Alat ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if ($this->session->userdata('level') == 'Anggota') {
			$this->data['pinjam'] = $this->db->query(
				"SELECT DISTINCT `pinjam_id`, `anggota_id`, `kode`,
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE status = 'Dipinjam' 
				AND anggota_id = ? ORDER BY pinjam_id DESC",
				array($this->session->userdata('anggota_id'))
			);
		} else {
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`, `kode`,
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE status = 'Dipinjam' ORDER BY pinjam_id DESC");
		}

		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pinjam_alat/pinjam_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function kembali()
	{
		$this->data['title_web'] = 'Data Pengembalian Alat ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if ($this->session->userdata('level') == 'Anggota') {
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`,`kode`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE anggota_id = ? AND status = 'Di Kembalikan' 
				ORDER BY id_pinjam DESC", array($this->session->userdata('anggota_id')));
		} else {
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`, `kode`,
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC");
		}

		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kembali_alat/home', $this->data);
		$this->load->view('footer_view', $this->data);
	}


	public function pinjam()
	{

		$this->data['nop'] = $this->M_Admin->buat_kode_pinjam('tbl_pinjam_alat', 'PJ', 'id_pinjam', 'ORDER BY id_pinjam DESC LIMIT 1');
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('tbl_login');
		$this->data['alat'] =  $this->db->query("SELECT * FROM tbl_alat ORDER BY id_alat DESC")->result_array();
		$this->data['siswa'] =  $this->db->query("SELECT * FROM tbl_siswa ORDER BY id_siswa DESC")->result_array();

		$this->data['title_web'] = 'Tambah Pinjam Alat ';

		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pinjam_alat/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detailpinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$id = $this->uri->segment('3');
		if ($this->session->userdata('level') == 'Anggota') {
			$count = $this->db->get_where('tbl_pinjam_alat', [
				'pinjam_id' => $id,
				'anggota_id' => $this->session->userdata('anggota_id')
			])->num_rows();
			if ($count > 0) {
				$this->data['pinjam'] = $this->db->query(
					"SELECT DISTINCT `pinjam_id`, 
				`anggota_id`, `status`, 
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE pinjam_id = ? 
				AND anggota_id =?",
					array($id, $this->session->userdata('anggota_id'))
				)->row();
			} else {
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="' . base_url('transaksi_alat') . '"</script>';
			}
		} else {
			$count = $this->M_Admin->CountTableId('tbl_pinjam_alat', 'pinjam_id', $id);
			if ($count > 0) {
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`anggota_id`, `status`, 
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam_alat WHERE pinjam_id = '$id'")->row();
			} else {
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="' . base_url('transaksi_alat') . '"</script>';
			}
		}
		$this->data['sidebar'] = 'kembali';
		$this->data['title_web'] = 'Detail Pinjam Alat ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pinjam_alat/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function kembalipinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$id = $this->uri->segment('3');
		$count = $this->M_Admin->CountTableId('tbl_pinjam_alat', 'pinjam_id', $id);
		if ($count > 0) {
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
			`anggota_id`, `status`, 
			`tgl_pinjam`, `lama_pinjam`, 
			`tgl_balik`, `tgl_kembali` 
			FROM tbl_pinjam_alat WHERE pinjam_id = '$id'")->row();
		} else {
			echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="' . base_url('transaksi_alat') . '"</script>';
		}


		$this->data['title_web'] = 'Kembali Pinjam Alat ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pinjam_alat/kembali', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function prosespinjam()
	{
		$post = $this->input->post();

		if (!empty($post['tambah'])) {

			$tgl = $post['tgl'];
			$kode_alat = $post['alat'];
			$tgl2 = date('Y-m-d', strtotime('+' . $post['lama'] . ' days', strtotime($tgl)));
			$cekAlat = $this->db->query("SELECT * FROM tbl_pinjam_alat WHERE kode = '" . $kode_alat . "' AND status = 'Dipinjam'")->result_array();

			if (count($cekAlat) > 0) {
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
				<p> Gagal Pinjam Alat ! Alat Peraga Sedang dipinjam siswa lain</p>
				</div></div>');
				}
			} else {

				$data[] = array(
					'pinjam_id' => htmlentities($post['nopinjam']),
					'anggota_id' => htmlentities($post['siswa']),
					'kode' => $kode_alat,
					'status' => 'Dipinjam',
					'tgl_pinjam' => htmlentities($post['tgl']),
					'lama_pinjam' => htmlentities($post['lama']),
					'tgl_balik'  => $tgl2,
					'tgl_kembali'  => '0',
				);

				$total_array = count($data);
				if ($total_array != 0) {
					$this->db->insert_batch('tbl_pinjam_alat', $data);
				}
				if ($this->$_SESSION['pesan'] == null) {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Alat Sukses !</p>
			</div></div>');
				}
			}
			redirect(base_url('transaksi_alat'));
		}

		if ($this->input->get('pinjam_id')) {
			$this->M_Admin->delete_table('tbl_pinjam_alat', 'pinjam_id', $this->input->get('pinjam_id'));
			$this->M_Admin->delete_table('tbl_denda', 'pinjam_id', $this->input->get('pinjam_id'));
			if ($this->$_SESSION['pesan'] == null) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p>  Hapus Transaksi Pinjam Alat Sukses !</p>
			</div></div>');
			}
			redirect(base_url('transaksi_alat'));
		}

		if ($this->input->get('kembali')) {
			$id = $this->input->get('kembali');
			$pinjam = $this->db->query("SELECT  * FROM tbl_pinjam_alat WHERE pinjam_id = '$id'");

			foreach ($pinjam->result_array() as $isi) {
				$pinjam_id = $isi['pinjam_id'];
				$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
				$jml = $this->db->query("SELECT * FROM tbl_pinjam_alat WHERE pinjam_id = '$pinjam_id'")->num_rows();
				if ($denda->num_rows() > 0) {
					$s = $denda->row();
					echo $s->denda;
				} else {
					$date1 = date('Ymd');
					$date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
					$diff = $date2 - $date1;
					if ($diff >= 0) {
						$harga_denda = 0;
						$lama_waktu = 0;
					} else {
						$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
						$harga_denda = $jml * ($dd->harga_denda * abs($diff));
						$lama_waktu = abs($diff);
					}
				}
			}

			$data = array(
				'status' => 'Di Kembalikan',
				'tgl_kembali'  => date('Y-m-d'),
			);

			$total_array = count($data);
			if ($total_array != 0) {
				$this->db->where('pinjam_id', $this->input->get('kembali'));
				$this->db->update('tbl_pinjam_alat', $data);
			}

			$data_denda = array(
				'pinjam_id' => $this->input->get('kembali'),
				'denda' => $harga_denda,
				'lama_waktu' => $lama_waktu,
				'tgl_denda' => date('Y-m-d'),
			);
			$this->db->insert('tbl_denda', $data_denda);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Pengembalian Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi_alat'));
		}
	}

	public function denda()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['denda'] =  $this->db->query("SELECT * FROM tbl_biaya_denda ORDER BY id_biaya_denda DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_biaya_denda', 'id_biaya_denda', $id);
			if ($count > 0) {
				$this->data['den'] = $this->db->query("SELECT *FROM tbl_biaya_denda WHERE id_biaya_denda='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('transaksi/denda') . '"</script>';
			}
		}

		$this->data['title_web'] = ' Denda ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('denda/denda_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function dendaproses()
	{
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$data = array(
				'harga_denda' => $post['harga'],
				'stat' => 'Tidak Aktif',
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->insert('tbl_biaya_denda', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah  Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi_alat/denda'));
		}

		if (!empty($this->input->post('edit'))) {
			$dd = $this->M_Admin->get_tableid('tbl_biaya_denda', 'stat', 'Aktif');
			foreach ($dd as $isi) {
				$data1 = array(
					'stat' => 'Tidak Aktif',
				);
				$this->db->where('id_biaya_denda', $isi['id_biaya_denda']);
				$this->db->update('tbl_biaya_denda', $data1);
			}

			$post = $this->input->post();
			$data = array(
				'harga_denda' => $post['harga'],
				'stat' => $post['status'],
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->where('id_biaya_denda', $post['edit']);
			$this->db->update('tbl_biaya_denda', $data);


			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi_alat/denda'));
		}

		if (!empty($this->input->get('denda_id'))) {
			$this->db->where('id_biaya_denda', $this->input->get('denda_id'));
			$this->db->delete('tbl_biaya_denda');

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Harga Denda Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi_alat/denda'));
		}
	}


	public function result()
	{

		$user = $this->M_Admin->get_tableid_edit('tbl_siswa', 'kode_anggota', $this->input->post('kode_anggota'));
		error_reporting(0);
		if ($user->nama != null) {
			echo '<table class="table table-striped">
						<tr>
							<td>Kode Anggota</td>
							<td>:</td>
							<td>' . $user->kode_anggota . '</td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>' . $user->nama . '</td>
						</tr>
						<tr>
							<td>Jenkel</td>
							<td>:</td>
							<td>' . $user->jenkel . '</td>
						</tr>
					</table>';
		} else {
			echo 'Anggota Tidak Ditemukan !';
		}
	}

	public function buku()
	{
		$id = $this->input->post('kode_buku');
		$row = $this->db->query("SELECT * FROM tbl_buku WHERE buku_id ='$id'");

		if ($row->num_rows() > 0) {
			$tes = $row->row();
			$item = array(
				'id'      => $id,
				'qty'     => 1,
				'price'   => '1000',
				'name'    => $tes->title,
				'options' => array('isbn' => $tes->isbn, 'thn' => $tes->thn_buku, 'penerbit' => $tes->penerbit)
			);
			if (!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($id);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if ($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		} else {
		}
	}

	public function alat_list()
	{
		$alat = $this->M_Admin->get_tableid_edit('tbl_alat', 'kode_alat', $this->input->post('kode_alat'));
		$id = $alat->id_kategori;
		$row = $this->db->query("SELECT * FROM tbl_kategori_alat WHERE id_kategori ='$id'");
		$kategori = $row->row();
		error_reporting(0);
		if ($alat->nama_alat != null) {
			echo '<table class="table table-striped">
						<tr>
							<td>Kode Alat</td>
							<td>:</td>
							<td>' . $alat->kode_alat . '</td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>' . $alat->nama_alat . '</td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td>:</td>
							<td>' . $kategori->nama_kategori . '</td>
						</tr>
						
					</table>';
		} else {
			echo 'Alat Tidak Ditemukan !';
		}
	}

	public function del_cart()
	{
		error_reporting(0);
		$id = $this->input->post('buku_id');
		$index = $this->exists($id);
		$cart = array_values(unserialize($this->session->userdata('cart')));
		unset($cart[$index]);
		$this->session->set_userdata('cart', serialize($cart));
		// redirect('jual/tambah');
		echo '<script>$("#result_buku").load("' . base_url('transaksi/buku_list') . '");</script>';
	}

	private function exists($id)
	{
		$cart = array_values(unserialize($this->session->userdata('cart')));
		for ($i = 0; $i < count($cart); $i++) {
			if ($cart[$i]['buku_id'] == $id) {
				return $i;
			}
		}
		return -1;
	}
}
