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
						<form action="<?php echo base_url('transaksi/prosespinjam'); ?>" method="POST" enctype="multipart/form-data">

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
														<option  value="<?= $isi['kode_anggota']; ?>"> <?= $isi['kode_anggota']; ?> - <?= $isi['nama']; ?> </option>
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
											<td colspan="3">Pinjam Buku</td>
										</tr>
										<tr>
											<td>Kode Buku</td>
											<td>:</td>
											<td>
												
												<select class="form-control select2" onchange="getvalBuku(this);" required="required" id="buku_box" name="buku">
													<option disabled selected value> -- Pilih Buku -- </option>
													<?php foreach ($buku as $isiBuku) { ?>
														<option  value="<?= $isiBuku['kode_buku']; ?>"> <?= $isiBuku['kode_buku']; ?> - <?= $isiBuku['title']; ?></option>
													<?php } ?>
												</select>

											</td>
										</tr>
										<tr>
											<td>Data Buku</td>
											<td>:</td>
											<td>
												<div id="result_tunggu_buku">
													<p style="color:red">* Belum Ada Hasil</p>
												</div>
												<div id="result_buku"></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="pull-right">
								<input type="hidden" name="tambah" value="tambah">
								<button type="submit" class="btn btn-primary btn-md">Submit</button>
						</form>
						<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>

<script>
	

	function getvalBuku(sel) {
		// alert(sel.value);
		$.ajax({
			type: 'POST', 
			url: '<?php echo base_url('transaksi/buku_list'); ?>', 
			data: 'kode_buku=' + sel.value, 
			beforeSend: function() {
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html) {
				$("#result_buku").html(html);
				$("#result_tunggu_buku").html('');
			}
		});
	}
</script>



<script>
	
	function getval(sel) {
		// alert(sel.value);
		$.ajax({
			type: 'POST', 
			url: '<?php echo base_url('transaksi/result'); ?>', 
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

