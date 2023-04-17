<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets_style/assets/dist/css/responsivelogin.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .active {
      background-color: #4CAF50 !important;
      color: white;
    }

    /* .inactive {
      background: red;
      color: white;
    } */

    .navbar-inverse {
      background-color: #333;
    }

    .text-stroke {
      /* Prefix required. Even Firefox only supports the -webkit- prefix */
      -webkit-text-stroke-width: 0.5px;
      -webkit-text-stroke-color: black;

    }

    .navbar-color {
      color: #fff;
    }

    .login-page {
      overflow-y: hidden;
      background: url('assets_style/image/bg3.png') no-repeat;
      background-size: 100%;
    }

    blink,
    .blink {
      animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }

    @media screen and (min-width: 300px) and (max-width:799px) {
      .login-page {
        background: url('assets_style/image/Buku-mobile.png') no-repeat;
        background-size: 100%;
        overflow-y: hidden;
      }

      .login-logo {
        font-size: 30px;
      }
    }
    @media screen and (min-width: 800px) and (max-width:1200px) {
      .login-page {
        background: url('assets_style/image/Buku-tab.png') no-repeat;
        background-size: 100%;
        overflow-y: hidden;
      }

      .login-logo {
        font-size: 30px;
      }
    }
  </style>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets_style/image/cirlce.png'); ?>">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <br />
    <div class="login-logo">
      <a href="index.php" class="text-stroke" style="color: yellow;"><b>Sistem Informasi</b> <br /><b>Perpustakaan</b></a>
    </div>
    <div id="tampilalert"></div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border:2px solid #226bbf;">
      <p class="login-box-msg" style="font-size:16px;"></p>
      <form action="<?= base_url('login/auth'); ?>" method="POST">
        <div class="form-group has-feedback">
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <button type="button" value="petugas" class="active btn_level btn btn-default">Petugas</button>
            </div>
            <div class="btn-group" role="group">
              <button type="button" value="anggota" class="inactive btn_level btn btn-default">Anggota</button>
            </div>
          </div>
        </div>
        <input type="hidden" name="level" id="level" value="petugas">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            
          </div>
          <div class="col-xs-4">
            <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat">Sign In</button>
            <div id="loadingcuy"></div>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
    <br />
    <footer>
      <div class="login-box-body text-center bg-blue">
        <a style="color: yellow;"> Copyright &copy; Kampus Mengajar Angkatan 5 - <?php echo date("Y"); ?>
          <br>
          <a style="color: yellow;"> SDN GETASKEREP 01
      </div>
    </footer>
  </div>
  <!-- /.login-box -->
  <!-- Response Ajax -->
  <div id="tampilkan"></div>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <script>
    $(document).ready(function() {
      $('.btn_level').click(function() {
        $('.btn_level').removeClass('active').addClass('inactive');
        $(this).removeClass('inactive').addClass('active');

        let level = $(this).val();
        $('#level').val(level);

      });
    })

    
  </script>
</body>

</html>