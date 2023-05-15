<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($this->session->userdata('level') == 'Anggota') {
  redirect(base_url('transaksi'));
} ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-sm-12">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $count_pengguna; ?></h3>

              <p>Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!--small box-->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $count_buku; ?></h3>

              <p>Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="data" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!--small box-->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $count_buku_digital; ?></h3>

              <p>Buku Digital</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="data/bukudigital" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!--small box-->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $count_alat; ?></h3>

              <p>Alat Peraga</p>
            </div>
            <div class="icon">
              <i class="fa fa-gamepad"></i>
            </div>
            <a href="alat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $count_pinjam; ?></h3>

              <p>Pinjam Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $count_pinjam_alat; ?></h3>

              <p>Pinjam Alat</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="transaksi_alat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Grafik Kunjungan Perpustakaan Tahun <?= date('Y')?></h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  $(function() {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober' , 'November' , 'Desember'],
      datasets: [{
          label: 'Data Kunjungan',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            <?= $count_januari?>,
            <?= $count_februari?>,
            <?= $count_maret?>,
            <?= $count_april?>,
            <?= $count_mei?>,
            <?= $count_juni?>,
            <?= $count_juli?>,
            <?= $count_agustus?>,
            <?= $count_september?>,
            <?= $count_oktober?>,
            <?= $count_november?>,
            <?= $count_desember?>,
            
            
            ]
        },
        
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
  })
</script>
<!-- /.content -->