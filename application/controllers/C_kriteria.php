<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_kriteria extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy(); //menghancurkan semua session
            redirect(base_url('index.php/c_login')); //mengarahkan ke halaman login
        }
    }

    public function index()
    {
        $data['content'] = "admin/kriteria/V_daftar_kriteria"; //admin merupakan folder didalam view, v_daftar_kriteria merupakan file php yg merupakan isi dari halam
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kriteria, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    //tambah data kriteria
    function ac_add_kriteria()
    {
        $kriteria = $this->input->post('nama_kriteria');
        $pf = $this->input->post('pf');
        $data = array(
            'kriteria' => $kriteria,
            'tipe_preferensi' => $pf
        );
        $hasil = $this->M_kriteria->input($data, 't_kriteria');
        if ($hasil) {
            $this->session->set_flashdata('success', 'Data kriteria berhasil ditambahkan!');
            redirect('c_kriteria');
        } else {
            $this->session->set_flashdata('warning', 'Data kriteria gagal ditambahkan!');
            redirect('c_kriteria');
        }
    }

    //aksi untuk merubah data kriteria
    public function ac_update_kriteria()
    {
        $id = $this->input->post('id_kriteria');
        $kriteria = $this->input->post('nama_kriteria');
        $pf = $this->input->post('pf');
        $data = array(
            'kriteria' => $kriteria,
            'tipe_preferensi' => $pf
        );
        $where = "id_kriteria='" . $id . "'";
        $hasil = $this->M_kriteria->update($where, $data, 't_kriteria');
        if ($hasil) {
            $this->session->set_flashdata('success', 'Data kriteria berhasil perbaharui!');
            redirect('c_kriteria');
        } else {
            $this->session->set_flashdata('warning', 'Data kriteria gagal perbaharui!');
            redirect('c_kriteria');
        }
    }

    //aksi hapus data kriteria
    public function ac_del_kriteria()
    {
        $id = $this->input->post('id_kriteria');
        $hasil = $this->M_kriteria->hapus($id); //memanggil fungsi hapus dari m_kriteria dengan parameter $id
        if ($hasil) {
            $this->session->set_flashdata('success', 'Data kriteria berhasil perbaharui!');
            redirect('c_kriteria');
        } else {
            $this->session->set_flashdata('warning', 'Data kriteria gagal perbaharui!');
            redirect('c_kriteria');
        }
    }
}
