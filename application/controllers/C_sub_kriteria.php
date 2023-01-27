<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_sub_kriteria extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
        $this->load->model('M_sub_kriteria'); //memanggil model M_sub_kriteria
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy(); //menghancurkan semua session
            redirect(base_url('index.php/c_login')); //mengarahkan ke halaman login
        }
    }

    public function index()
    {
        $data['content'] = "admin/kriteria/V_daftar_sub_kriteria"; //admin merupakan folder didalam view, v_daftar_kriteria merupakan file php yg merupakan isi dari halam
        $data['sub'] = $this->M_sub_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_sub_kriteria, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    public function add_sub_kriteria()
    {
        $data['content'] = "admin/kriteria/V_add_sub_kriteria"; //admin merupakan folder didalam view, v_daftar_kriteria merupakan file php yg merupakan isi dari halam
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kriteria, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    public function ac_add_sub()
    {
        $id_kriteria = $this->input->post('kriteria');
        $data_form = $this->input->post('data');

        var_dump($data_form);
        for ($i = 0; $i < count($data_form); $i++) {
            $data = array(
                'id_kriteria' => $id_kriteria,
                'sub_kriteria' => $data_form[$i]['sub'],
                'nilai' => $data_form[$i]['nilai'],
                'keterangan_sub' => $data_form[$i]['keterangan']
            );
            $this->M_sub_kriteria->input($data, 't_sub_kriteria');
        }
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        redirect('c_sub_kriteria');
    }

    //aksi untuk merubah data sub
    public function ac_update_sub()
    {
        $id = $this->input->post('id_sub'); //mengambil data yang dikirim dari modal edit sub dengan method post
        $sub = $this->input->post('nama_sub');
        $nilai = $this->input->post('nilai');
        $ket = $this->input->post('keterangan');
        $where = "id_sub='" . $id . "'";
        $data = array( //membuat array untuk menyimpan variable
            'sub_kriteria' => $sub, //menyimpan data kedalam variable
            'nilai' => $nilai,
            'keterangan_sub' => $ket
        );
        $this->M_sub_kriteria->update($where, $data, 't_sub_kriteria'); //kirim data baru ke model
        $this->session->set_flashdata("success", "Data berhasil diperbaharui!"); //flashdata
        redirect('c_sub_kriteria');
    }

    //aksi hapus data sub
    public function ac_del_sub()
    {
        $id = $this->input->post('id_sub');
        $this->M_sub_kriteria->hapus($id); //memanggil fungsi hapus dari m_sub_kriteria dengan parameter $id
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('c_sub_kriteria');
    }
}
