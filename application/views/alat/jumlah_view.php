<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpus_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function getJumlahAlat($conn, $nama)
{
    $sql = ('SELECT sum(jumlah) FROM `tbl_alat` WHERE nama_alat = "' . $nama.'"');
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        return $row['sum(jumlah)'];
    }
    
}

function getKategoriAlat($conn, $idKategori)
{
    $sql = ('SELECT * FROM `tbl_kategori_alat` WHERE `id_kategori` = ' . $idKategori);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return ($row['nama_kategori']);
    }
    
}

?>
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


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <a href="<?php echo base_url('cetak/jumlah_alat'); ?>" target="_blank"><button class="btn btn-warning"> <i class="fa fa-print"></i> Data Jumlah Alat</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br />
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Total Alat Peraga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($alat->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['nama_alat']; ?></td>
                                            <td><?= getKategoriAlat($conn, $isi['id_kategori']); ?></td>
                                            <td><?= getJumlahAlat($conn, $isi['nama_alat']) ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    <?php $conn->close() ?>

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