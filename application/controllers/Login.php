<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
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
        $this->data['title_web'] = 'Login | Sistem Informasi Perpustakaan';
        $this->load->view('login_view', $this->data);
    }

    public function auth()
    {
        $user = htmlspecialchars($this->input->post('user', TRUE), ENT_QUOTES);
        $pass = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);
        $level = htmlspecialchars($this->input->post('level', TRUE), ENT_QUOTES);


        // login petugas

        if ($level == "petugas") {
            // auth
            $proses_login = $this->db->query("SELECT * FROM tbl_login WHERE user='$user' AND pass = md5('$pass')");
            $row = $proses_login->num_rows();
            if ($row > 0) {
                $hasil_login = $proses_login->row_array();

                // create session
                $this->session->set_userdata('masuk_perpus', TRUE);
                $this->session->set_userdata('level', $hasil_login['level']);
                $this->session->set_userdata('ses_id', $hasil_login['id_login']);
                $this->session->set_userdata('anggota_id', $hasil_login['anggota_id']);

                echo '<script>window.location="' . base_url() . 'dashboard";</script>';
            } else {

                echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password Anda");
            window.location="' . base_url() . '"</script>';
            }
        } else {
            // auth
            $proses_login = $this->db->query("SELECT * FROM tbl_siswa WHERE kode_anggota='$user' AND kode_anggota = '$pass'");
            $row = $proses_login->num_rows();
            if ($row > 0) {
                $hasil_login = $proses_login->row_array();

                // // create session
                $this->session->set_userdata('masuk_perpus_digital', TRUE);
                $this->session->set_userdata('ses_dig_id', $hasil_login['id_siswa']);
                $this->session->set_userdata('kode_anggota', $hasil_login['kode_anggota']);
                $this->session->set_userdata('nama', $hasil_login['nama']);
                $tanggal = date("Y-m-d");
                $kehadiran = $this->db->query("SELECT * FROM tbl_kehadiran WHERE siswa_id = ". $hasil_login['id_siswa']. "  AND tgl_kehadiran = '". $tanggal . "'") ;
                $rowKehadiran = $kehadiran->num_rows(); 

                if($rowKehadiran == 0){
                    $data = array(
                        'id_kehadiran' => '',
                        'tgl_kehadiran' => date("Y-m-d"),
                        'siswa_id' => $hasil_login['id_siswa']
    
                    );
                   
                    $this->db->insert('tbl_kehadiran', $data);
                }
               
                echo '<script>window.location="' . base_url() . 'buku_digital";</script>';
            } else {

                echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password Anda");
            window.location="' . base_url() . '"</script>';
            }
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        echo '<script>window.location="' . base_url() . '";</script>';
    }
}
