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
                        <form action="<?php echo base_url('alat/prosesalat'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" required="required" name="kategori">
                                            <option disabled selected value> -- Pilih Kategori -- </option>
                                            <?php foreach ($kats as $isi) { ?>
                                                <option value="<?= $isi['id_kategori']; ?>"><?= $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Nama Alat</label>
                                        <input type="text" class="form-control" required name="title" placeholder="Contoh : KIT Bentang Alam">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" min="1" required name="jml" value="1" readonly placeholder="Jumlah : 1">
                                    </div>
                                    <div class="form-group">
                                        <label>Kondisi</label>
                                        <select name="kondisi" class="form-control" required="required">
                                            <option value="Layak" selected>Layak</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                            </div>
                        </form>
                        <a href="<?= base_url('alat'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>