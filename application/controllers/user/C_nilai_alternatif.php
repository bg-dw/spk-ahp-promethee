<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_nilai_alternatif extends CI_Controller
{
    //fungsi yang akan dijalankan pertama kali oleh c_kedelai
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_nilai_alternatif'); //memanggil model M_nilai_alternatif
    }

    //halaman default c_kedelai
    public function index()
    {
        $data['content'] = "user/alternatif/V_daftar_nilai"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['nilai'] = $this->M_nilai_alternatif->get_data()->result(); //memanggil fungsi get_data didalam model M_nilai_alternatif, dengan return query result()
        $this->load->view('user/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }
}
