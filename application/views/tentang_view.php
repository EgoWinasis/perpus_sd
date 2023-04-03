<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($this->session->userdata('level') == 'Anggota') {
  redirect(base_url('transaksi'));
} ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tentang Kami
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tentang Kami</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="box box-primary">
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>

              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                <div class="item active">
                  <img src="<?php echo base_url(); ?>assets_style/image/Bersama.png" alt="Foto Bersama Kegiatan FKKS" >
                  <div class="carousel-caption">
                    <h3>TIM KAMPUS MENGAJAR ANGKATAN 5</h3>
                    <p>SDN GETASKEREP 01</p>
                  </div>
                </div>

                <div class="item">
                  <img src="<?php echo base_url(); ?>assets_style/image/Ego.png" alt="Foto Ego Winasis" >
                  <div class="carousel-caption">
                  <h3>Ego Winasis</h3>
                    <p>Politeknik Harapan Bersama Tegal</p>
                  </div>
                </div>

                <div class="item">
                  <img src="<?php echo base_url(); ?>assets_style/image/Dona.png" alt="Foto Dona">
                  <div class="carousel-caption">
                  <h3>Dona Safitri</h3>
                    <p>Universitas Negeri Semarang</p>
                  </div>
                </div>

                <div class="item">
                  <img src="<?php echo base_url(); ?>assets_style/image/Wina.png" alt="Foto Wina" >
                  <div class="carousel-caption">
                  <h3>Wina Sabita Al Jauziah</h3>
                    <p>Universitas Singaperbangsa Karawang</p>
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo base_url(); ?>assets_style/image/Sip.png" alt="Foto Syifa" >
                  <div class="carousel-caption">
                  <h3>Fatih Azhar Syifani</h3>
                    <p>Universitas Negeri Semarang</p>
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo base_url(); ?>assets_style/image/Winda.png" alt="Foto Winda" >
                  <div class="carousel-caption">
                  <h3>Winda Mirtasya Utami</h3>
                    <p>Universitas Negeri Semarang</p>
                  </div>
                </div>

              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content -->