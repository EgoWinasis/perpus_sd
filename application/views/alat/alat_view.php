<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> <?= $title_web; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web; ?></li>
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
                        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                            <a href="alat/alattambah"><button class="btn btn-primary">
                                    <i class="fa fa-plus"> </i> Tambah Alat</button></a>
                        <?php } ?>

                        <button id="print_button" class="btn btn-success ">
                            <i class="fa fa-print"></i> Cetak Label</button>

                        <a href="<?php echo base_url('cetak/alat') ?>" target="_blank"><button class="btn btn-warning"> <i class="fa fa-print"></i> Alat</button></a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Stok</th>
                                        <th>Dipinjam</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal Masuk</th>
                                        <th style="width: 50px;">Cetak Label
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                        </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($alat->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['kode_alat']; ?></td>
                                            <td><?= $isi['nama_alat']; ?></td>
                                            <td><?= $isi['jumlah']; ?></td>
                                            <td>
                                                <?php
                                                $id = $isi['kode_alat'];
                                                $dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE kode= '$id' AND status = 'Dipinjam'");
                                                if ($dd->num_rows() > 0) {
                                                    echo $dd->num_rows();
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                            </td>
                                            <td><?= $isi['kondisi']; ?></td>
                                            <td><?= $isi['tgl_masuk']; ?></td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="checkbox" value="<?= $isi['id_alat']; ?>" id="printCheckbox">
                                                </div>
                                            </td>
                                            <td <?php if ($this->session->userdata('level') == 'Petugas') { ?>style="width:17%;" <?php } ?>>

                                                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                    <a href="<?= base_url('alat/alatedit/' . $isi['id_alat']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('alat/alatdetail/' . $isi['id_alat']); ?>">
                                                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                    <a href="<?= base_url('alat/prosesalat?alat_id=' . $isi['id_alat']); ?>" onclick="return confirm('Anda yakin alat ini akan dihapus ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('alat/alatdetail/' . $isi['id_alat']); ?>">
                                                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                <?php } ?>
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
                document.cookie = `dataAlat =  ${text}`;
            });
            if (val.length > 0) {
                window.open('<?= base_url('alat/printalat/') ?>', '_blank');
            } else {
                alert("Pilih Alat terlebih dahulu");
            }
        });
    });
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>