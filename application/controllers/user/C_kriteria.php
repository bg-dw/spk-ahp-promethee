<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_kriteria extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
    }

    public function index()
    {
        $data['content'] = "user/kriteria/V_daftar_kriteria"; //admin merupakan folder didalam view, v_daftar_kriteria merupakan file php yg merupakan isi dari halam
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kriteria, dengan return query result()
        $this->load->view('user/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }
}
