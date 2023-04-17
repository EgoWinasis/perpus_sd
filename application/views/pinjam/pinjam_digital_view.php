<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<?php $this->session->set_userdata('pesan', null); ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
               
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Baca</th>
                                
                            </tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($pinjam->result_array() as $isi){
									$id_siswa = $isi['id_siswa'];
									$ang = $this->db->query("SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'")->row();
									
									$id_buku = $isi['id_buku'];
									$buku = $this->db->query("SELECT * FROM tbl_buku_digital WHERE id_buku = '$id_buku'")->row();

									
						?>
                            <tr>
                                <td><?= $no;?></td>\
                                <td><?= $ang->kode_anggota;?></td>
                                <td><?= $ang->nama;?></td>
                                <td><?= $buku->kode_buku;?></td>
                                <td><?= $buku->title;?></td>
                                <td><?= $isi['tgl_baca'];?></td>
                               
								
                            </tr>
                        <?php $no++;}?>
						</tbody>
					</table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
