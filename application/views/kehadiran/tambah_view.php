<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Kehadiran
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Kehadiran</li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form name="form_kehadiran" action="<?php echo base_url('kehadiran/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- <div class="col-sm-2"></div> -->
                                <div class="col-sm-12">



                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" value="<?= $today; ?>" name="tanggal" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <label style="border-bottom: 1px solid;">Filter Siswa</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Dari</label>
                                        <input type="text" class="form-control" name="filter_siswa_dari" id="filter_siswa_dari" min="0001" max="9999" minlength="4" maxlength="4" required="required" placeholder="0001 - 9999">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sampai</label>
                                        <input type="text" class="form-control" id="filter_siswa_sampai" minlength="4" maxlength="4" required="required" placeholder="0001 - 9999">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                     <div class="form-group">          
                            <a onclick="cari()" class="btn btn-primary">Cari</a>
                                         </div>
                                </div>
                                <div class="col-sm-12">

                                    <label>Ceklis Siswa</label>
                                    <div class="form-group" id="check_siswa">

                                       

                                    </div>

                                </div>
                                <div class="col-sm-12">

                                    
                                    <div class="form-group pull-right">
                                        <label>Ceklis semua</label>
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                    </div>
                            </div>

                            <div class="pull-right">
                                <button id="submit" type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('kehadiran'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>

<script>
    $(function() {
        $('#submit').hover(function() {
            var val = [];
            $('.check:checkbox:checked').each(function(i) {
                val[i] = $(this).val();
                let text = val.toString();
                // // console.log(text);
                document.cookie = `dataKehadiran =  ${text}`;
            });
            // console.log(val);
            if (val.length <= 0) {
                alert("Pilih Siswa terlebih dahulu");
            }
            if (val.length > 20) {
                alert("Jumlah siswa Maksimal 20");
            }

        });
    });

    function cari(){
            var x = document.forms["form_kehadiran"]["filter_siswa_sampai"].value;
            var y = document.forms["form_kehadiran"]["filter_siswa_dari"].value;

            if (isNaN(x) || (x == "0000") || (x == "")|| isNaN(y) || (y == "0000") || (y == "")) {
            alert("Filter tidak valid");
            return false;
            }
            else{

                 var siswa_dari = $("#filter_siswa_dari").val();
                 var siswa_sampai = $("#filter_siswa_sampai").val();

                 $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "<?php echo base_url('kehadiran/result'); ?>",
                        data: 'siswa_dari=' + siswa_dari + '&siswa_sampai=' + siswa_sampai,
                        success: function(result_siswa) {
                            $("#check_siswa").empty();
                            $.each(result_siswa, function(idx, siswa) {
                                // console.log(siswa.nama);
                                $("#check_siswa").append(`
                                <div class="col-sm-4" id="siswa">
                                    <div class="form-check">
                                         <input class="form-check-input check" type="checkbox" value="${siswa.id_siswa}" id="printCheckbox"> ${siswa.kode_anggota} - ${siswa.nama}
                                    </div>
                                </div>
                                `);


                            });
                        }
                    });
            }
    }

   $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

   
</script>