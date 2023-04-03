<?php
// var_dump($_COOKIE['data']);
$data_print = $_COOKIE['dataBuku'];
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
$sql = ('SELECT * FROM tbl_buku WHERE id_buku IN (' . $ids . ')');
$result = $conn->query($sql);



function getKategori($conn, $idKategori)
{
    $sql = ('SELECT * FROM `tbl_kategori` WHERE `id_kategori` = ' . $idKategori);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    return ($row['nama_kategori']);
 
}

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

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <title>Cetak Label Buku</title>
    <style>
        body {
            background: rgba(0, 0, 0, 0.2);
        }

        .card {
            /* Add shadows to create the "card" effect */
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
            border: 1px solid;
           
        }

        /* Thick red border */
        hr {
            border: 1px solid black;
        }

        tbody {
            font-size: 12px;
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
            margin: 10px;

        }

        .col-print-5 {
            width: 42%;
            float: left;
            margin: 10px;
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
        .garis {
            border-bottom: 1px solid;
        }

        .td {
            margin-left: 5px;
            margin-right: 5px;
        }

        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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
                            <div class="card ">

                                <table style="width: 100%;">
                                    <thead>
                                        <th colspan="3" class="garis text-center">PERPUSTAKAAN<br>SDN GETASKEREP 01</th>

                                    </thead>
                                    <tbody>

                                        
                                            
                    
                                       

                                        <tr>
                                            <td>KODE</td>
                                            <td class="td">:</td>
                                            <td><?= $row['kode_buku']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>JUDUL</td>
                                            <td class="td">:</td>
                                            <td><?= $row['title']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>KATEGORI</td>
                                            <td class="td">:</td>
                                            <td><?= getKategori($conn, $row['id_kategori']); ?></td>
                                        </tr>
                                        


                                    </tbody>
                                </table>


                            </div>
                        </div>
                        <?php if ($index % 16 == 0) {
                            echo '<div class="pagebreak"> </div>';
                        }
                        $index++;
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $conn->close() ?>
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