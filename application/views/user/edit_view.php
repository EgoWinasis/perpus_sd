<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Update Siswa - <?= $user->nama; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Siswa - <?= $user->nama; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($this->session->flashdata())) {
                    echo $this->session->flashdata('pesan');
                } ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('user/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <input type="text" class="form-control" value="<?= $user->nama; ?>" name="nama" required="required" placeholder="Nama Siswa">
                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <select class="form-control" name="jenkel" id="jenkel">
                                            <option value="Laki-laki" <?= ($user->jenkel == "Laki-laki")? "selected": ''?>>Laki-laki</option>
                                            <option value="Perempuan" <?= ($user->jenkel == "Perempuan")? "selected": ''?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="pull-right">
                            <input type="hidden" class="form-control" value="<?= $user->id_siswa; ?>" name="id_siswa" >
                                <button type="submit" class="btn btn-primary btn-md">Edit Data</button>
                        </form>
                        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                            <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-md">Kembali</a>
                        <?php } elseif ($this->session->userdata('level') == 'Anggota') { ?>
                            <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>