<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Mpdf\Mpdf as PDF;

class Cetak extends CI_Controller
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
	public function cetak_siswa()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Siswa.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$siswa =  $this->db->query("SELECT * FROM tbl_siswa ORDER BY kode_anggota")->result_array();


		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE SISWA");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA ANGGOTA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='15%'>Kode Anggota</th>
			<th class='table-border' width='60%'>Nama</th>
			<th class='table-border' width='20%'>Jenis Kelamin</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($siswa); $i++) {
			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$siswa[$i]['kode_anggota']}</td>
					<td class='table-border'>{$siswa[$i]['nama']}</td>
					<td class='table-border'>{$siswa[$i]['jenkel']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Anggota.pdf", "I");
	}


	public function jumlah_buku()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Siswa.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$jumlahBuku = $this->db->query("SELECT * FROM tbl_buku GROUP BY title ORDER BY title ASC")->result_array();




		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE JUMLAH BUKU");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA JUMLAH BUKU PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='45%'>Judul</th>
			<th class='table-border' width='15%'>Kategori</th>
			<th class='table-border' width='15%'>Penerbit</th>
			<th class='table-border' width='10%'>Tahun Buku</th>
			<th class='table-border' width='10%'>Jumlah Total Buku</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($jumlahBuku); $i++) {

			$kategori = $this->db->query("SELECT * FROM tbl_kategori WHERE `id_kategori` = " . $jumlahBuku[$i]['id_kategori'])->result_array();
			$jumlah = $this->db->query('SELECT sum(jml) FROM `tbl_buku` WHERE title = "' . $jumlahBuku[$i]['title'] . '"')->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$jumlahBuku[$i]['title']}</td>
					<td class='table-border'>{$kategori[0]['nama_kategori']}</td>
					<td class='table-border'>{$jumlahBuku[$i]['penerbit']}</td>
					<td class='table-border'>{$jumlahBuku[$i]['thn_buku']}</td>
					<td class='table-border'>{$jumlah[0]['sum(jml)']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Buku.pdf", "I");
	}

	public function buku()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4-L',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Buku.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$buku =  $this->db->query("SELECT * FROM tbl_buku ORDER BY kode_buku")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE BUKU");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA BUKU PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='10%'>Kode</th>
			<th class='table-border' width='20%'>ISBN</th>
			<th class='table-border' width='20%'>Judul</th>
			<th class='table-border' width='13%'>Kategori</th>
			<th class='table-border' width='15%'>Penerbit</th>
			<th class='table-border' width='7%'>Thn</th>
			<th class='table-border' width='10%'>Kondisi</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($buku); $i++) {

			$kategori = $this->db->query("SELECT * FROM tbl_kategori WHERE `id_kategori` = " . $buku[$i]['id_kategori'])->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$buku[$i]['kode_buku']}</td>
					<td class='table-border'>{$buku[$i]['isbn']}</td>
					<td class='table-border'>{$buku[$i]['title']}</td>
					<td class='table-border'>{$kategori[0]['nama_kategori']}</td>
					<td class='table-border'>{$buku[$i]['penerbit']}</td>
					<td class='table-border'>{$buku[$i]['thn_buku']}</td>
					<td class='table-border'>{$buku[$i]['kondisi']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Buku.pdf", "I");
	}

	public function kategori()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Kategori.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$kategori =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY kode_kategori")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE KATEGORI");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA KATEGORI BUKU PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='30'>Kode</th>
			<th class='table-border' width='65%'>Kategori</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($kategori); $i++) {



			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$kategori[$i]['kode_kategori']}</td>
					<td class='table-border'>{$kategori[$i]['nama_kategori']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Kategori.pdf", "I");
	}
	// 
	public function buku_digital()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4-L',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Buku Digital.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$digital =  $this->db->query("SELECT * FROM tbl_buku_digital ORDER BY kode_buku")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE BUKU DIGITAL");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA BUKU DIGITAL PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='10%'>Kode</th>
			<th class='table-border' width='15%'>ISBN</th>
			<th class='table-border' width='25%'>Judul</th>
			<th class='table-border' width='13%'>Kategori</th>
			<th class='table-border' width='25%'>Penerbit</th>
			<th class='table-border' width='7%'>Thn</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($digital); $i++) {

			$kategori = $this->db->query("SELECT * FROM tbl_kategori WHERE `id_kategori` = " . $digital[$i]['id_kategori'])->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$digital[$i]['kode_buku']}</td>
					<td class='table-border'>{$digital[$i]['isbn']}</td>
					<td class='table-border'>{$digital[$i]['title']}</td>
					<td class='table-border'>{$kategori[0]['nama_kategori']}</td>
					<td class='table-border'>{$digital[$i]['penerbit']}</td>
					<td class='table-border'>{$digital[$i]['thn_buku']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Buku Digital.pdf", "I");
	}


	public function alat()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Alat.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$alat =  $this->db->query("SELECT * FROM tbl_alat ORDER BY kode_alat")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE ALAT PERAGA");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA ALAT PERAGA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='15%'>Kode</th>
			<th class='table-border' width='45%'>Nama</th>
			<th class='table-border' width='20%'>Kategori</th>
			<th class='table-border' width='15%'>Kondisi</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($alat); $i++) {

			$kategori = $this->db->query("SELECT * FROM tbl_kategori_alat WHERE `id_kategori` = " . $alat[$i]['id_kategori'])->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$alat[$i]['kode_alat']}</td>
					<td class='table-border'>{$alat[$i]['nama_alat']}</td>
					<td class='table-border'>{$kategori[0]['nama_kategori']}</td>
					<td class='table-border'>{$alat[$i]['kondisi']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Alat Peraga.pdf", "I");
	}

	public function jumlah_alat()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Alat.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$jumlahAlat = $this->db->query("SELECT * FROM tbl_alat GROUP BY nama_alat ORDER BY nama_alat ASC")->result_array();




		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE JUMLAH ALAT PERAGA");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA JUMLAH ALAT PERAGA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='45%'>Nama</th>
			<th class='table-border' width='15%'>Kategori</th>
			<th class='table-border' width='10%'>Jumlah Total Alat</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($jumlahAlat); $i++) {

			$kategori = $this->db->query("SELECT * FROM tbl_kategori_alat WHERE `id_kategori` = " . $jumlahAlat[$i]['id_kategori'])->result_array();
			$jumlah = $this->db->query('SELECT sum(jumlah) FROM `tbl_alat` WHERE nama_alat = "' . $jumlahAlat[$i]['nama_alat'] . '"')->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$jumlahAlat[$i]['nama_alat']}</td>
					<td class='table-border'>{$kategori[0]['nama_kategori']}</td>
					<td class='table-border'>{$jumlah[0]['sum(jumlah)']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Alat Peraga.pdf", "I");
	}

	public function kategori_alat()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Kategori.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$kategori =  $this->db->query("SELECT * FROM tbl_kategori_alat ORDER BY kode_kategori")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE KATEGORI ALAT");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA KATEGORI ALAT PERAGA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='30'>Kode</th>
			<th class='table-border' width='65%'>Kategori</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($kategori); $i++) {



			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$kategori[$i]['kode_kategori']}</td>
					<td class='table-border'>{$kategori[$i]['nama_kategori']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Kategori.pdf", "I");
	}


	public function kehadiran()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Kehadiran.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$kehadiran = $this->db->query("SELECT * FROM `tbl_siswa` ORDER BY kode_anggota")->result_array();




		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE JUMLAH KEHADIRAN ANGGOTA");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA JUMLAH KEHADIRAN ANGGOTA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='15%'>Kode Anggota</th>
			<th class='table-border' width='55%'>Nama</th>
			<th class='table-border' width='15%'>Jenis Kelamin</th>
			<th class='table-border' width='10%'>Jumlah Kehadiran</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($kehadiran); $i++) {

			$jumlah = $this->db->query("SELECT COUNT(tgl_kehadiran) FROM `tbl_kehadiran` WHERE siswa_id LIKE '%" . $kehadiran[$i]['id_siswa'] . "%'")->result_array();

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$kehadiran[$i]['kode_anggota']}</td>
					<td class='table-border'>{$kehadiran[$i]['nama']}</td>
					<td class='table-border'>{$kehadiran[$i]['jenkel']}</td>
					<td class='table-border'>{$jumlah[0]['COUNT(tgl_kehadiran)']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data kehadiran.pdf", "I");
	}


	public function pinjam_buku()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4-L',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Pinjam Buku.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$pinjamBuku =  $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`,`kode`, 
		`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
		FROM tbl_pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE DATA PEMINJAMAN BUKU");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA PEMINJAMAN BUKU PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='10%'>No. Pinjam</th>
			<th class='table-border' width='10%'>Kode Anggota</th>
			<th class='table-border' width='23%'>Nama</th>
			<th class='table-border' width='10%'>Kode Buku</th>
			<th class='table-border' width='10%'>Pinjam</th>
			<th class='table-border' width='10%'>Balik</th>
			<th class='table-border' width='12%'>Status</th>
			<th class='table-border' width='10%'>Kembali</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($pinjamBuku); $i++) {

		$siswa =  $this->db->query("SELECT * FROM tbl_siswa WHERE kode_anggota = '".$pinjamBuku[$i]['anggota_id'] . "'")->result_array();
	

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$pinjamBuku[$i]['pinjam_id']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['anggota_id']}</td>
					<td class='table-border'>{$siswa[0]['nama']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['kode']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['tgl_pinjam']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['tgl_balik']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['status']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['tgl_kembali']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Peminjaman Buku.pdf", "I");
	}

	public function total_pinjam_buku()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Pinjam Buku.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$pinjamBuku =  $this->db->query("SELECT  COUNT(pinjam_id) AS total, `pinjam_id`, `anggota_id`,`kode`, 
		`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
		FROM tbl_pinjam WHERE status = 'Di Kembalikan' GROUP BY anggota_id ORDER BY total DESC")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE DATA PEMINJAMAN BUKU");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA TOTAL PEMINJAMAN BUKU PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='15%'>Kode Anggota</th>
			<th class='table-border' width='70%'>Nama</th>
			<th class='table-border' width='10%'>Total</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($pinjamBuku); $i++) {

		$siswa =  $this->db->query("SELECT * FROM tbl_siswa WHERE kode_anggota = '".$pinjamBuku[$i]['anggota_id'] . "'")->result_array();
		
	

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$pinjamBuku[$i]['anggota_id']}</td>
					<td class='table-border'>{$siswa[0]['nama']}</td>
					<td class='table-border'>{$pinjamBuku[$i]['total']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Alat Peraga.pdf", "I");
	}


	public function pinjam_alat()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4-L',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Pinjam Alat.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$pinjamAlat =  $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`,`kode`, 
		`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
		FROM tbl_pinjam_alat WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE DATA PEMINJAMAN BUKU");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA PEMINJAMAN ALAT PERAGA PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

		<th class='table-border' width='5%'>No.</th>
		<th class='table-border' width='10%'>No. Pinjam</th>
		<th class='table-border' width='10%'>Kode Anggota</th>
		<th class='table-border' width='23%'>Nama</th>
		<th class='table-border' width='10%'>Kode Buku</th>
		<th class='table-border' width='10%'>Pinjam</th>
		<th class='table-border' width='10%'>Balik</th>
		<th class='table-border' width='12%'>Status</th>
		<th class='table-border' width='10%'>Kembali</th>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($pinjamAlat); $i++) {

		$siswa =  $this->db->query("SELECT * FROM tbl_siswa WHERE kode_anggota = '".$pinjamAlat[$i]['anggota_id'] . "'")->result_array();
	

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$pinjamAlat[$i]['pinjam_id']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['anggota_id']}</td>
					<td class='table-border'>{$siswa[0]['nama']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['kode']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['tgl_pinjam']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['tgl_balik']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['status']}</td>
					<td class='table-border'>{$pinjamAlat[$i]['tgl_kembali']}</td>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Alat Peraga.pdf", "I");
	}


	public function pinjam_digital()
	{
		// Create the mPDF document
		$document = new PDF([
			'mode' => 'utf-8',
			'format' => 'A4-L',
			'margin_header' => '3',
			'margin_top' => '10',
			'margin_bottom' => '10',
			'margin_footer' => '2',
			'default_font_size' => 12,
			'default_font' => 'sans-serif'
		]);
		$documentFileName = "Data Pinjam Alat.pdf";
		// Set some header informations for output
		$header = [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
		];


		$pinjamDigital =  $this->db->query("SELECT * FROM `tbl_pinjam_digital` ORDER BY tgl_baca")->result_array();





		// Write some simple Content
		$stylesheet = file_get_contents('cetak.css');
		$document->SetTitle("DATABASE DATA BACA BUKU DIGITAL");
		$document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
		$document->WriteHTML("
		<h4 class='text-center'>DATA BACA BUKU DIGITAL PERPUSTAKAAN SDN GETASKEREP 01</h4>
	");


		$headerTable = "<table class='table-border' width='100%'>
	<thead>
		<tr>

			<th class='table-border' width='5%'>No.</th>
			<th class='table-border' width='10%'>Kode Anggota</th>
			<th class='table-border' width='25%'>Nama</th>
			<th class='table-border' width='10%'>Kode Buku</th>
			<th class='table-border' width='30%'>Judul</th>
			<th class='table-border' width='20%'>Tanggal Baca</th>>
		</tr>
	</thead>
	<tbody>";
		$footerTable = "
			</tbody>
		</table>
			";

		$dataTable = "";

		$no = 1;
		for ($i = 0; $i < count($pinjamDigital); $i++) {

		$siswa =  $this->db->query("SELECT * FROM tbl_siswa WHERE id_siswa = ".$pinjamDigital[$i]['id_siswa'])->result_array();
		$buku =  $this->db->query("SELECT * FROM tbl_buku_digital WHERE id_buku = ".$pinjamDigital[$i]['id_buku'])->result_array();
	

			$tbody = "
				<tr>
				
					<td class='table-border'>{$no}</td>
					<td class='table-border'>{$siswa[0]['kode_anggota']}</td>>
					<td class='table-border'>{$siswa[0]['nama']}</td>>
					<td class='table-border'>{$buku[0]['kode_buku']}</td>>
					<td class='table-border'>{$buku[0]['title']}</td>>
					<td class='table-border'>{$pinjamDigital[$i]['tgl_baca']}</td>>
				</tr>
				";

			$dataTable .= $tbody;

			$no++;
		}

		$html = $headerTable . $dataTable . $footerTable;

		$document->WriteHTML("{$html}");
		$document->Output("Data Alat Peraga.pdf", "I");
	}
}
