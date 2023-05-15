<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
	 	 if($this->session->userdata('masuk_perpus') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		function hitung($data){
			$jumlah=0;

			foreach ($data as $dt) {
				$jumlah += count ( explode(",", $dt['siswa_id']));
				
			}
			return $jumlah;
			
		}

		$years = date('Y');
		$januari = $years . "-".'01';
		$februari = $years . "-".'02';
		$maret = $years . "-".'03';
		$april = $years . "-".'04';
		$mei = $years . "-".'05';
		$juni = $years . "-".'06';
		$juli = $years . "-".'07';
		$agustus = $years . "-".'08';
		$september = $years . "-".'09';
		$oktober = $years . "-".'10';
		$november = $years . "-".'11';
		$desember = $years . "-".'12';

		$data_januari = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$januari ."%'")->result_array();
		$data_februari = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$februari ."%'")->result_array();
		$data_maret = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$maret ."%'")->result_array();
		$data_april = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$april ."%'")->result_array();
		$data_mei = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$mei ."%'")->result_array();
		$data_juni = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$juni ."%'")->result_array();
		$data_juli = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$juli ."%'")->result_array();
		$data_agustus = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$agustus ."%'")->result_array();
		$data_september = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$september ."%'")->result_array();
		$data_oktober = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$oktober ."%'")->result_array();
		$data_november = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$november ."%'")->result_array();
		$data_desember = $this->db->query("SELECT * FROM tbl_kehadiran WHERE tgl_kehadiran Like '".$desember ."%'")->result_array();


		$this->data['count_januari']= hitung($data_januari);
		$this->data['count_februari']= hitung($data_februari);
		$this->data['count_maret']= hitung($data_maret);
		$this->data['count_april']= hitung($data_april);
		$this->data['count_mei']= hitung($data_mei);
		$this->data['count_juni']= hitung($data_juni);
		$this->data['count_juli']= hitung($data_juli);
		$this->data['count_agustus']= hitung($data_agustus);
		$this->data['count_september']= hitung($data_september);
		$this->data['count_oktober']= hitung($data_oktober);
		$this->data['count_november']= hitung($data_november);
		$this->data['count_desember']= hitung($data_desember);

		
		
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Dashboard ';
		$this->data['count_pengguna']=$this->db->query("SELECT * FROM tbl_siswa")->num_rows();
		$this->data['count_buku']=$this->db->query("SELECT * FROM tbl_buku")->num_rows();
		$this->data['count_buku_digital']=$this->db->query("SELECT * FROM tbl_buku_digital")->num_rows();
		$this->data['count_alat']=$this->db->query("SELECT * FROM tbl_alat")->num_rows();
		$this->data['count_pinjam']=$this->db->query("SELECT * FROM tbl_pinjam WHERE status = 'Dipinjam'")->num_rows();
		$this->data['count_pinjam_alat']=$this->db->query("SELECT * FROM tbl_pinjam_alat WHERE status = 'Dipinjam'")->num_rows();
		// $this->data['count_kembali']=$this->db->query("SELECT * FROM tbl_pinjam WHERE status = 'Di Kembalikan'")->num_rows();
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('dashboard_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	
}
