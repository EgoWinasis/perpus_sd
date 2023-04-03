<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i>Data Kehadiran Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp;Data Kehadiran Siswa</li>
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
                        <div class="col-sm-2">

                            <a href="kehadiran/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Kehadiran</button></a>
                        </div>
                        <div class="col-sm-3">

                            <div class="form-group">

                                <input type="date" id="tanggal" class="form-control" value="<?= $today ?>" name="tanggal" required="required" placeholder="Contoh : 1999-05-18">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <br />
                        <div class=" table-responsive">

                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Anggota</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">


                                    <?php if (!empty($siswa)) { ?>
                                        <?php $no = 1;
                                        foreach ($siswa as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['kode_anggota']; ?></td>
                                                <td><?= $isi['nama']; ?></td>
                                                <td><?= $isi['jenkel']; ?></td>

                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $("#tanggal").change(function() {
        // variabel dari nilai combo box kendaraan
        var tanggal = $("#tanggal").val();
        // console.log(tanggal);
        $("#tbody").empty();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url('kehadiran/kehadiran_siswa'); ?>",
            data: "tanggal=" + tanggal,
            success: function(result_siswa) {

                let i = 1;
                $.each(result_siswa, function(idx, siswa) {
                    // console.log(siswa.nama);
                    $("#tbody").append(`
                    <tr>
                       <td>${i++}</td>
                       <td>${siswa.kode_anggota}</td>
                       <td>${siswa.nama}</td>
                        <td>${siswa.jenkel}</td>
                                            
                    </tr>
                    `);


                });
            }
        });
    });
</script>