<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_nilai_alternatif extends CI_Controller
{
    //fungsi yang akan dijalankan pertama kali oleh c_kedelai
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kedelai'); //memanggil model M_kedelai
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
        $this->load->model('M_sub_kriteria'); //memanggil model M_sub_kriteria
        $this->load->model('M_nilai_alternatif'); //memanggil model M_nilai_alternatif
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/c_login'));
        }
    }

    //halaman default c_kedelai
    public function index()
    {
        $data['content'] = "admin/alternatif/V_daftar_nilai"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['nilai'] = $this->M_nilai_alternatif->get_data()->result(); //memanggil fungsi get_data didalam model M_nilai_alternatif, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    //tambah data nilai
    function add_nilai()
    {
        $data['content'] = "admin/alternatif/V_add_nilai_alternatif"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['kedelai'] = $this->M_kedelai->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kriteria, dengan return query result()
        $data['sub'] = $this->M_sub_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_sub_kriteria, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    //aksi tambah data
    function ac_add_nilai()
    {
        $alt = $this->input->post('alternatif');
        $id_k = $this->input->post('id_kriteria');
        $id_sub = $this->input->post('nilai');

        // var_dump($id_sub);
        // echo $id_sub[0];
        for ($i = 0; $i < count($id_k); $i++) {
            $data = array(
                'id_kedelai' => $alt,
                'id_kriteria' => $id_k[$i],
                'id_sub' => $id_sub[$i]
            );
            $this->M_nilai_alternatif->input($data, 't_nilai_alternatif');
        }
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        redirect('c_nilai_alternatif');
    }

    function edit_nilai($id)
    {
        $data['content'] = "admin/alternatif/V_edit_nilai_alternatif"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['nilai'] = $this->M_nilai_alternatif->get_edit($id)->row(); //memanggil fungsi get_edit didalam model M_nilai_alternatif, dengan return query result()
        $data['sub'] = $this->M_sub_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_sub_kriteria, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    //aksi untuk merubah data nilai
    public function ac_update_nilai()
    {
        $id = $this->input->post('id_nilai');
        $id_sub = $this->input->post('nilai');
        $where = "id_nilai='" . $id . "'";
        $data = array( //membuat array untuk menyimpan variable
            'id_sub' => $id_sub //menyimpan data kedalam variable
        );
        $this->M_nilai_alternatif->update($where, $data, 't_nilai_alternatif'); //kirim data baru ke model
        $this->session->set_flashdata("success", "Data berhasil diperbaharui!"); //flashdata
        redirect('c_nilai_alternatif');
    }

    //aksi hapus data kedelai
    public function ac_del_nilai()
    {
        $id = $this->input->post('id_nilai');
        $this->M_nilai_alternatif->hapus($id); //memanggil fungsi hapus dari m_nilai_alternatif dengan parameter $id
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('c_nilai_alternatif');
    }
}
