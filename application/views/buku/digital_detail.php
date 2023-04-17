<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<?php
	$idkat = $buku->id_kategori;

	$kat = $this->M_Admin->get_tableid_edit('tbl_kategori','id_kategori',$idkat);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-book" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-book"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
					<h4><?= $buku->title;?></h4>
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
					<table class="table table-striped table-bordered">
						<tr>
							<td style="width:20%">ISBN</td>
							<td><?= $buku->isbn;?></td>
						</tr>
						<tr>
							<td>Judul Buku</td>
							<td><?= $buku->title;?></td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td><?= $kat->nama_kategori;?></td>
						</tr>
						<tr>
							<td>Penerbit</td>
							<td><?= $buku->penerbit;?></td>
						</tr>
						<tr>
							<td>Pengarang</td>
							<td><?= $buku->pengarang;?></td>
						</tr>
						<tr>
							<td>Tahun Terbit</td>
							<td><?= $buku->thn_buku;?></td>
						</tr>
						<tr>
							<td>Jumlah Halaman</td>
							<td><?= $buku->total_hal;?> hal.</td>
						</tr>
						<tr>
							<td>Sampul</td>
							<td>
								<img src="<?php echo base_url(); ?>assets_style/image/buku/lampiran/<?= $buku->lampiran; ?>/1.png"  width="200px" alt="sampul"></td>
							</td>
						</tr>
						<tr>
							<td>File</td>
							<td>
							<?= $buku->lampiran?>
							<a  href="<?php echo base_url('/data/read/' . $buku->id_buku);?>"  class="btn btn-primary btn-xs" style="margin-left:1pc;">
									<i class="fa fa-sign-in"></i> Lihat File</a>
							</td>
						</tr>
						
						<tr>
							<td>Tanggal Masuk</td>
							<td><?= $buku->tgl_masuk;?></td>
						</tr>
					</table>
		        </div>
			</div>
			<div >
			<a href="<?= base_url('data/bukudigital'); ?>" class="btn btn-danger btn-md">Kembali</a>
			</div>
			
	    </div>
    </div>
</section>
</div>

<!-- /.modal -->
