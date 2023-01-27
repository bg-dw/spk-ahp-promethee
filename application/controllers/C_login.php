<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_login extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_login di jalankan
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        if ($this->session->userdata('login') == TRUE) {
            redirect(base_url('index.php/c_dashboard_admin')); //mengarahkan ke halaman login
        }
        $this->load->view('V_login');
    }

    //validasi login admin
    public function auth()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $query = $this->M_login->auth_user_admin($user, $pass); //memanggil fungsi auth_user_admin dari model M_login dengan parameter $user , $pass
        if ($query->num_rows() > 0) {
            $data = $query->row_array(); //mengambil data dengan cara membuatnya menjadi array

            $this->session->set_userdata('login', TRUE); //memberikan nilai TRUE pada userdata login
            $this->session->set_userdata('nama', $data['nama_admin']); //memberikan nilai nama_admin yang di ambil dari databae pada userdata nama 
            $this->session->set_userdata('user', $data['username']); //memberikan nilai username yang di ambil dari databae pada userdata user
            $this->session->set_userdata('id', $data['id_admin']);
            $this->session->set_flashdata('success', 'Login Berhasil!'); //membuat flashdata dengan parameter success dan isi pesan 'Login Berhasil'
            redirect(base_url('index.php/c_dashboard_admin/'));
        } else {
            $this->session->set_flashdata('warning', 'Username atau Password anda salah!'); //membuat flashdata dengan parameter success dan isi pesan 'Login Berhasil'
            redirect(base_url('index.php/c_login'));
        }
    }

    //fungsi logout
    function logout()
    {
        $this->session->sess_destroy(); //menghancurkan/menghilangkan session yang sudah dibuat ketika login
        redirect(base_url());
    }
}
