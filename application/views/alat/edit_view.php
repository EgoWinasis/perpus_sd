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
                                                <option value="<?= $isi['id_kategori']; ?>" <?php if ($isi['id_kategori'] == $alat->id_kategori) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul alat</label>
                                        <input type="text" class="form-control" required value="<?= $alat->nama_alat; ?>" name="title" placeholder="Contoh : Kit Bentang Alam">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah alat</label>
                                        <input type="number" class="form-control" min="1" required value="<?= $alat->jumlah; ?>" name="jml" value="1" readonly placeholder="Jumlah alat : 1">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="pull-right">
                            <input type="hidden" name="id_kategori_old" value="<?= $alat->id_kategori; ?>">
                                <input type="hidden" name="edit" value="<?= $alat->id_alat; ?>">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('alat'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>