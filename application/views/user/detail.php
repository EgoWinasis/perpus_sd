<?php
var_dump($val);
error_reporting(0);
if (!empty($_GET['download'] == 'doc')) {
	header("Content-Type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.doc");
}
if (!empty($_GET['download'] == 'xls')) {
	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: 0");
	header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.xls");
}
?>
<?php
$tgla = $user->tgl_bergabung;
$tglk = $user->tgl_lahir;
$bulan = array(
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
);

$array1 = explode("-", $tgla);
$tahun = $array1[0];
$bulan1 = $array1[1];
$hari = $array1[2];
$bl1 = $bulan[$bulan1];
$tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;


$array2 = explode("-", $tglk);
$tahun2 = $array2[0];
$bulan2 = $array2[1];
$hari2 = $array2[2];
$bl2 = $bulan[$bulan2];
$tgl2 = $hari2 . ' ' . $bl2 . ' ' . $tahun2;
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title><?= $title_web; ?></title>
	<style>
		body {
			background: rgba(0, 0, 0, 0.2);
		}

		.card {
			/* Add shadows to create the "card" effect */
			padding-left: 10px;
			padding-right: 10px;
			padding-top: 20px;
			padding-bottom: 30px;
			border: 1px solid;
			margin-bottom: 10px;
			background-image: '../../asset_style/image/km5getaskerep.jpg';
		}

		/* Thick red border */
		hr {
			border: 1px solid black;
		}

		.col-print-1 {
			width: 8%;
			float: left;
		}

		.col-print-2 {
			width: 16%;
			float: left;
		}

		.col-print-3 {
			width: 25%;
			float: left;
		}

		.col-print-4 {
			width: 33%;
			float: left;
		}

		.col-print-5 {
			width: 42%;
			float: left;
			margin: 20px;
		}

		.col-print-6 {
			width: 50%;
			float: left;
		}

		.col-print-7 {
			width: 58%;
			float: left;
		}

		.col-print-8 {
			width: 66%;
			float: left;
		}

		.col-print-9 {
			width: 75%;
			float: left;
		}

		.col-print-10 {
			width: 83%;
			float: left;
		}

		.col-print-11 {
			width: 92%;
			float: left;
		}

		.col-print-12 {
			width: 100%;
			float: left;
		}

		page[size="A4"] {
			background: white;
			width: 21cm;
			/* height: 29.7cm; */
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5pc;
			padding-left: 2.54cm;
			padding-right: 2.54cm;
			padding-top: 1.54cm;
			padding-bottom: 1.54cm;
		}

		@media print {

			body,
			page[size="A4"] {
				margin: 0;
				box-shadow: 0;
			}

			.pagebreak {
				clear: both;
				page-break-after: always;
			}

			/* page-break-after works, as well */
		}
	</style>
</head>

<body>
	<br />
	<div id="printableArea">
		<page size="A4">
			<div class="row">
				<?php for ($i = 1; $i < 30; $i++) : ?>

					<div class="col-print-5">
						<div class="card">
							
							<table style="width: 100%;"  >
								<thead>
									<th ><img width="50px" src="<?php echo base_url('assets_style/image/tutwurihandayani.png');?>" ></th>
									<th colspan="3" class="text-left">KARTU PERPUSTAKAAN <br>SDN GETASKEREP 01</th>

								</thead>
								<tbody>
									
									<tr>
										<td colspan="3">
											<hr>
										</td>
									</tr>
									<tr>
										<td></td>
									</tr>
									<tr>
										<td>NIS</td>
										<td>:</td>
										<td>21041003</td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td>:</td>
										<td>Ego Winasis</td>
									</tr>
									<tr>
										<td>KELAS</td>
										<td>:</td>
										<td>5</td>
									</tr>
									<tr>
										<td>TTL</td>
										<td>:</td>
										<td>Tegal, 8-12-2000</td>
									</tr>

								</tbody>
							</table>

							
						</div>
					</div>
					<?php if ($i % 8 == 0) {
						echo '<div class="pagebreak"> </div>';
					}?>
				<?php endfor; ?>
			</div>

		</page>
	</div>
</body>
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

</html>