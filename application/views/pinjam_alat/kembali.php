<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-sign-out" style="color:green"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-sign-out"></i>&nbsp; <?= $title_web; ?></li>
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
											<?= $pinjam->pinjam_id; ?>
										</td>
									</tr>
									<tr>
										<td>Tgl Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_pinjam; ?>
										</td>
									</tr>
									<tr>
										<td>Tgl pengembalian</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_balik; ?>
										</td>
									</tr>
									<tr>
										<td>Kode Anggota</td>
										<td>:</td>
										<td>
											<?= $pinjam->anggota_id; ?>
										</td>
									</tr>
									<tr>
										<td>Biodata</td>
										<td>:</td>
										<td>
											<?php
											$user = $this->M_Admin->get_tableid_edit('tbl_siswa', 'kode_anggota', $pinjam->anggota_id);
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
											?>
										</td>
									</tr>
									<tr>
										<td>Lama Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->lama_pinjam; ?> Hari
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
										<td>Status</td>
										<td>:</td>
										<td>
											<?= $pinjam->status; ?>
										</td>
									</tr>
									<tr>
										<td>Tgl Kembali</td>
										<td>:</td>
										<td>
											<?php
											if ($pinjam->tgl_kembali == '0') {
												echo '<p style="color:red;">belum dikembalikan</p>';
											} else {
												echo $pinjam->tgl_kembali;
											}

											?>
										</td>
									</tr>
									<tr>
										<td>Denda</td>
										<td>:</td>
										<td>
											<?php
											$pinjam_id = $pinjam->pinjam_id;
											$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");

											$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
											$date1 = date('Ymd');
											$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
											$diff = $date1 - $date2;
											/*	$datetime1 = new DateTime($date1);
													$datetime2 = new DateTime($date2);
													$difference = $datetime1->diff($datetime2); */
											// echo $difference->days;
											if ($diff > 0) {
												echo $diff . ' hari';
												$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
												echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
													</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
											} else {
												echo '<p style="color:green;text-align:center;">
													Tidak Ada Denda</p>';
											}
											?>
										</td>
									</tr>

									<tr>
										<td>Kode Alat</td>
										<td>:</td>
										<td>
											<?php
											$pin = $this->M_Admin->get_tableid('tbl_pinjam_alat', 'pinjam_id', $pinjam->pinjam_id);
											$no = 1;
											foreach ($pin as $isi) {
												$alat = $this->M_Admin->get_tableid_edit('tbl_alat', 'kode_alat', $isi['kode']);
												echo  $alat->kode_alat . '<br/>';
												$no++;
											}

											?>
										</td>
									</tr>
									<tr>
										<td>Data Buku</td>
										<td>:</td>
										<td>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($pin as $isi) {
														$alat = $this->M_Admin->get_tableid_edit('tbl_alat', 'kode_alat', $isi['kode']);
													?>
														<tr>
															<td><?= $no; ?></td>
															<td><?= $alat->nama_alat; ?></td>
														</tr>
													<?php $no++;
													} ?>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="pull-right">
							<a data-toggle="modal" data-target="#TableDenda" class="btn btn-primary btn-md" style="margin-left:1pc;">
								<i class="fa fa-sign-in"></i> Kembalikan</a>
							<a href="<?= base_url('transaksi_alat'); ?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!--modal import -->
<div class="modal fade" id="TableDenda">
	<div class="modal-dialog" style="width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> Pengembalian Alat</h4>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table class="table table-striped">
					<tr style="background:yellowgreen">
						<td colspan="3">Data Peminjaman Alat</td>
					</tr>
					<tr>
						<td>No Peminjaman</td>
						<td>:</td>
						<td>
							<?= $pinjam->pinjam_id; ?>
						</td>
					</tr>
					<tr>
						<td>Tgl Peminjaman</td>
						<td>:</td>
						<td>
							<?= $pinjam->tgl_pinjam; ?>
						</td>
					</tr>
					<tr>
						<td>Tgl pengembalian</td>
						<td>:</td>
						<td>
							<?= $pinjam->tgl_balik; ?>
						</td>
					</tr>
					<tr>
						<td>Kode Anggota</td>
						<td>:</td>
						<td>
							<?= $pinjam->anggota_id; ?>
							<?php
							$user = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $pinjam->anggota_id);
							error_reporting(0);
							if ($user->nama != null) {
								echo ' ( ' . $user->nama . ' )';
							}
							?>
						</td>
					</tr>
					<tr>
						<td>Lama Peminjaman</td>
						<td>:</td>
						<td>
							<?= $pinjam->lama_pinjam; ?> Hari
						</td>
					</tr>
					<tr>
						<td>Tanggal Pengembalian</td>
						<td>:</td>
						<td>
							<?= date('Y-m-d'); ?> ( Sekarang )
						</td>
					</tr>
					<tr>
						<td>Terlewat Masa Pengembalian</td>
						<td>:</td>
						<td>
							<?php

							$date1 = date('Ymd');
							$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
							$diff = $date1 - $date2;
							if ($diff > 0) {
								echo abs($diff);
							} else {
								echo '0';
							}
							?> Hari
						</td>
					</tr>
					<tr>
						<td>Detail Alat</td>
						<td>:</td>
						<td>
							<?php
							$pin = $this->M_Admin->get_tableid('tbl_pinjam_alat', 'pinjam_id', $pinjam->pinjam_id);
							$no = 1;
							foreach ($pin as $isi) {
								$alat = $this->M_Admin->get_tableid_edit('tbl_alat', 'kode_alat', $isi['kode']);
								echo   $alat->nama_alat . ' <br/>';
								$no++;
							}

							?>
						</td>
					</tr>

					<tr>
						<td>Total Denda</td>
						<td>:</td>
						<td>
							<?php
							$pinjam_id = $pinjam->pinjam_id;
							$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");

							$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
							$date1 = date('Ymd');
							$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
							$diff = $date1 - $date2;
							/* $datetime1 = new DateTime($date1);
					$datetime2 = new DateTime($date2);
					$difference = $datetime1->diff($datetime2);*/
							// echo $difference->days;
							if ($diff > 0) {
								$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
								echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
					</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
							} else {
								echo '<p style="color:green;text-align:center;">
					Tidak Ada Denda</p>';
							}
							?>
						</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<a href="<?= base_url('transaksi_alat/prosespinjam?kembali=' . $pinjam->pinjam_id); ?>">
						<button class="btn btn-primary"> Proses Pengembalian</button></a>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->