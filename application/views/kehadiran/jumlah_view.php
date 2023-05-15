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


function getJumlah($conn, $idSiswa)
{
    
    $result = $conn->query("SELECT COUNT(tgl_kehadiran) FROM `tbl_kehadiran` WHERE siswa_id LIKE '%" . $idSiswa . "%'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    
    return ($row["COUNT(tgl_kehadiran)"]);
 
}



?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i>Data Jumlah Kehadiran Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp;Data Jumlah Kehadiran Siswa</li>
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
                    <a href="<?php echo base_url('cetak/kehadiran'); ?>" target="_blank"><button class="btn btn-warning"> <i class="fa fa-print"></i> Jumlah Kehadiran</button></a>
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
                                        <th>Jumlah Kehadiran</th>
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
                                                <td><?= getJumlah($conn, $isi['id_siswa']); ?></td>

                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    <?php } ?>

                                </tbody>
                                <?php $conn->close() ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>