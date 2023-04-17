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
                            <a href="<?php echo base_url('data/digitaltambah'); ?>"><button class="btn btn-primary">
                                    <i class="fa fa-plus"> </i> Tambah Buku</button></a>
                        <?php } ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Buku</th>
                                        <th>ISBN</th>
                                        <th>Judul</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Buku</th>
                                        <th>Hal</th>
                                        <th>Sampul</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($buku->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['kode_buku']; ?></td>
                                            <td><?= $isi['isbn']; ?></td>
                                            <td><?= $isi['title']; ?></td>
                                            <td><?= $isi['penerbit']; ?></td>
                                            <td><?= $isi['thn_buku']; ?></td>
                                            <td><?= $isi['total_hal']; ?> hal</td>
                                            <td><img src="<?php echo base_url(); ?>assets_style/image/buku/lampiran/<?= $isi['lampiran']; ?>/1.png"  width="50px" alt="sampul"></td>
                                            <td><?= $isi['tgl_masuk']; ?></td>
                                           
                                            <td <?php if ($this->session->userdata('level') == 'Petugas') { ?>style="width:17%;" <?php } ?>>

                                                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                    <a href="<?= base_url('data/digitaledit/' . $isi['id_buku']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('data/digitaldetail/' . $isi['id_buku']); ?>">
                                                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                    <a href="<?= base_url('data/prosesdigital?buku_id=' . $isi['id_buku']); ?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('data/bukudetail/' . $isi['id_buku']); ?>">
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
                console.log(val);
                let text = val.toString();
                // console.log(text);
                document.cookie = `dataBuku =  ${text}`;
            });
            if (val.length > 0) {
                window.open('<?= base_url('data/printbuku/') ?>', '_blank');
            } else {
                alert("Pilih Buku terlebih dahulu");
            }
        });
    });
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>