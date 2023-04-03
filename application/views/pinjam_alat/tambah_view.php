<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-plus" style="color:green"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?php echo base_url('transaksi_alat/prosespinjam'); ?>" method="POST" enctype="multipart/form-data">

							<div class="row">
								<div class="col-sm-5">
									<table class="table table-striped">
										<tr style="background:yellowgreen">
											<td colspan="3">Data Transaksi</td>
										</tr>
										<tr>
											<td>No Peminjaman</td>
											<td>:</td>
											<td>
												<input type="text" name="nopinjam" value="<?= $nop; ?>" readonly class="form-control">
											</td>
										</tr>
										<tr>
											<td>Tgl Peminjaman</td>
											<td>:</td>
											<td>
												<input type="date" value="<?= date('Y-m-d'); ?>" name="tgl" class="form-control">
											</td>
										</tr>
										
										<tr>
											<td>Siswa</td>
											<td>:</td>
											<td>
												
												<select class="form-control select2" onchange="getval(this);" required="required" id="siswa_box" name="siswa">
													<option disabled selected value> -- Pilih Siswa -- </option>
													<?php foreach ($siswa as $isi) { ?>
														<option  value="<?= $isi['kode_anggota']; ?>"> <?= $isi['kode_anggota']; ?> - <?= $isi['nama']; ?>  </option>
													<?php } ?>
												</select>

											</td>
										</tr>
										<tr>
											<td>Biodata</td>
											<td>:</td>
											<td>
												<div id="result_tunggu">
													<p style="color:red">* Belum Ada Hasil</p>
												</div>
												<div id="result"></div>
											</td>
										</tr>
										<tr>
											<td>Lama Peminjaman</td>
											<td>:</td>
											<td>
												<input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" min="1" name="lama" class="form-control">
											</td>
										</tr>
									</table>
								</div>
								<div class="col-sm-7">
									<table class="table table-striped">
										<tr style="background:yellowgreen">
											<td colspan="3">Pinjam Alat</td>
										</tr>
										<tr>
											<td>Kode Alat</td>
											<td>:</td>
											<td>
												
												<select class="form-control select2" onchange="getvalAlat(this);" required="required" id="buku_box" name="alat">
													<option disabled selected value> -- Pilih Alat -- </option>
													<?php foreach ($alat as $isiAlat) { ?>
														<option  value="<?= $isiAlat['kode_alat']; ?>"> <?= $isiAlat['kode_alat']; ?> - <?= $isiAlat['nama_alat']; ?></option>
													<?php } ?>
												</select>

											</td>
										</tr>
										<tr>
											<td>Data Alat</td>
											<td>:</td>
											<td>
												<div id="result_tunggu_alat">
													<p style="color:red">* Belum Ada Hasil</p>
												</div>
												<div id="result_alat"></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="pull-right">
								<input type="hidden" name="tambah" value="tambah">
								<button type="submit" class="btn btn-primary btn-md">Submit</button>
						</form>
						<a href="<?= base_url('transaksi_alat'); ?>" class="btn btn-danger btn-md">Kembali</a>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>

<script>
	

	function getvalAlat(sel) {
		// alert(sel.value);
		$.ajax({
			type: 'POST', 
			url: '<?php echo base_url('transaksi_alat/alat_list'); ?>', 
			data: 'kode_alat=' + sel.value, 
			beforeSend: function() {
				$("#result_alat").html("");
				$("#result_tunggu_alat").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html) {
				$("#result_alat").html(html);
				$("#result_tunggu_alat").html('');
			}
		});
	}
</script>



<script>
	
	function getval(sel) {
		// alert(sel.value);
		$.ajax({
			type: 'POST', 
			url: '<?php echo base_url('transaksi_alat/result'); ?>', 
			data: 'kode_anggota=' + sel.value, 
			beforeSend: function() {
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html) {
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	}
</script>

