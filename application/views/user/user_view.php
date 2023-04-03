<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Siswa</li>
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
                        <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Siswa</button></a>

                        <button id="print_button" class="btn btn-success ">
                            <i class="fa fa-print"></i> Cetak Kartu</button>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- <a href="<?= base_url('user/detail/' . $isi['id_siswa']); ?>" target="_blank"><button class="btn btn-primary">
										<i class="fa fa-print"></i> Cetak Kartu</button></a> -->

                        <br />
                        <div class=" table-responsive">

                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Anggota</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th style="width: 150px;">Cetak Kartu
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['kode_anggota']; ?></td>
                                            <td><?= $isi['nama']; ?></td>
                                            <td><?= $isi['jenkel']; ?></td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="checkbox" value="<?= $isi['id_siswa']; ?>" id="printCheckbox">
                                                </div>
                                            </td>
                                            <td style="width:10%;">
                                                <a href="<?= base_url('user/edit/' . $isi['id_siswa']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                <a href="<?= base_url('user/del/' . $isi['id_siswa']); ?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
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
    $(function() {
        $('#print_button').click(function() {
            var val = [];
            $('.check:checkbox:checked').each(function(i) {
                val[i] = $(this).val();
                // console.log(val);
                let text = val.toString();
                // console.log(text);
                document.cookie = `data =  ${text}`;
            });
            if (val.length > 0) {
                window.open('<?= base_url('user/print/') ?>', '_blank');
            } else {
                alert("Pilih Siswa terlebih dahulu");
            }
        });
    });
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>