<?php
// var_dump($_COOKIE['data']);
$data_print = $_COOKIE['data'];
$data = explode(",", $data_print);


?>
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
$ids = implode(', ', $data);
// echo $ids;
$sql = ('SELECT * FROM tbl_siswa WHERE id_siswa IN (' . $ids . ')');
$result = $conn->query($sql);


// var_dump($row);

$conn->close();
?>
<?php

error_reporting(0);
if (!empty($_GET['download'] == 'doc')) {
    header("Content-Type: application/vnd.ms-word");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.doc");
}
if (!empty($_GET['download'] == 'xls')) {
    header("Content-Type: application/force-download");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.xls");
}
?>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
$index = 1;


?>

<?php


function nama($nama){

    $arrayNama = explode(" ", $nama);


// var_dump(count($arrayNama));
// die();
    if(count($arrayNama) >= 3){
        $nama_depan = $arrayNama[0];
        $nama_tengah = $arrayNama[1];
        $nama_akhir = $arrayNama[2];

        $namaTampil = $nama_depan." ". $nama_tengah. " " . substr($nama_akhir, 0,1) . ".";
    }else if(count($arrayNama) == 2){
         $nama_depan = $arrayNama[0];
         $nama_tengah = $arrayNama[1];
         $namaTampil = $nama_depan." ". $nama_tengah;
    }else{
        $namaTampil = $nama;
    }

    return $namaTampil;
   
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <title>Cetak Kartu Siswa</title>
    <style>
        body {
            background: rgba(0, 0, 0, 0.2);
        }

        .card {
            /* Add shadows to create the "card" effect */
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 20px;
            padding-bottom: 30px;
            border: 1px solid;
            margin-bottom: 10px;
            background-image: '../../asset_style/image/km5getaskerep.jpg';
        }

        /* Thick red border */
        hr {
            border: 1px solid black;
        }

        .col-print-1 {
            width: 8%;
            float: left;
        }

        .col-print-2 {
            width: 16%;
            float: left;
        }

        .col-print-3 {
            width: 25%;
            float: left;
        }

        .col-print-4 {
            width: 33%;
            float: left;
        }

        .col-print-5 {
            width: 42%;
            float: left;
            margin: 20px;
        }

        .col-print-6 {
            width: 50%;
            float: left;
        }

        .col-print-7 {
            width: 58%;
            float: left;
        }

        .col-print-8 {
            width: 66%;
            float: left;
        }

        .col-print-9 {
            width: 75%;
            float: left;
        }

        .col-print-10 {
            width: 83%;
            float: left;
        }

        .col-print-11 {
            width: 92%;
            float: left;
        }

        .col-print-12 {
            width: 100%;
            float: left;
        }

        .overflow {

            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }

        page[size="A4"] {
            background: white;
            width: 21cm;
            /* height: 29.7cm; */
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5pc;
            padding-left: 2.54cm;
            padding-right: 2.54cm;
            padding-top: 1.54cm;
            padding-bottom: 1.54cm;
        }
         td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        @media print {

            body,
            page[size="A4"] {
                margin: 0;
                box-shadow: 0;
            }

            .pagebreak {
                clear: both;
                page-break-after: always;
            }
            

            /* page-break-after works, as well */
        }
    </style>
</head>

<body>
    <br />
    <div id="printableArea">
        <page size="A4">
            <div class="row">

                <?php if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :

                ?>

                        <div class="col-print-5">
                            <div class="card">

                                <table style="width: 100%;" >
                                    <thead>
                                        <th style="text-align: center;"><img width="50px" src="<?php echo base_url('assets_style/image/tutwurihandayani.png'); ?>"></th>
                                        <th colspan="3" class="text-left">KARTU PERPUSTAKAAN <br>SDN GETASKEREP 01</th>

                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="3">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $row['kode_anggota']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td ><?= nama($row['nama']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kel.</td>
                                            <td>:</td>
                                            <td><?= $row['jenkel']; ?></td>
                                        </tr>


                                    </tbody>
                                </table>


                            </div>
                        </div>
                        <?php if ($index % 8 == 0) {
                            echo '<div class="pagebreak"> </div>';
                        }
                        $index++;
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </page>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<script>
    $(document).ready(function() {
        window.print();
        document.cookie = "data=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        console.log("cookie delete!");
    });
</script>

</html>