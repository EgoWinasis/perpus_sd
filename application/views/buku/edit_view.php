<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; <?= $title_web; ?></li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <?php $this->session->set_userdata('pesan', null); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('data/prosesbuku'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" required="required" name="kategori">
                                            <option disabled selected value> -- Pilih Kategori -- </option>
                                            <?php foreach ($kats as $isi) { ?>
                                                <option value="<?= $isi['id_kategori']; ?>" <?php if ($isi['id_kategori'] == $buku->id_kategori) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Rak / Lokasi</label>
                                        <select name="rak" class="form-control select2" required="required">
                                            <option disabled selected value> -- Pilih Rak / Lokasi -- </option>
                                            <?php foreach ($rakbuku as $isi) { ?>
                                                <option value="<?= $isi['id_rak']; ?>" <?php if ($isi['id_rak'] == $buku->id_rak) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $isi['nama_rak']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" class="form-control" value="<?= $buku->isbn; ?>" name="isbn" placeholder="Contoh ISBN : 978-602-8123-35-8">
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" required value="<?= $buku->title; ?>" name="title" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                    </div>
                                    <div class="form-group">
                                        <label>Kondisi</label>
                                        <select name="kondisi" class="form-control" required="required">
                                            <option value="Layak" <?= $buku->kondisi == "Layak"? "Selected": ""?>>Layak</option>
                                            <option value="Rusak" <?= $buku->kondisi == "Rusak"? "Selected": ""?>>Rusak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pengarang</label>
                                        <input type="text" class="form-control" value="<?= $buku->pengarang; ?>" name="pengarang" placeholder="Nama Pengarang">
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" value="<?= $buku->penerbit; ?>" name="penerbit" placeholder="Nama Penerbit">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Buku</label>
                                        <input type="number" class="form-control" min="1800" value="<?= $buku->thn_buku; ?>" name="thn" placeholder="Tahun Buku : 2019">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
                                        <input type="number" class="form-control" min="1" required readonly value="<?= $buku->jml; ?>" name="jml" placeholder="Jumlah buku : 12">
                                    </div>


                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="edit" value="<?= $buku->id_buku; ?>">
                                <input type="hidden" name="id_kategori_old" value="<?= $buku->id_kategori; ?>">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                            </div>
                        </form>
                        <a href="<?= base_url('data'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>