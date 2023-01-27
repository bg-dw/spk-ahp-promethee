<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_kedelai extends CI_Controller
{
    //fungsi yang akan dijalankan pertama kali oleh c_kedelai
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kedelai'); //memanggil model M_kedelai
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/c_login'));
        }
    }

    //halaman default c_kedelai
    public function index()
    {
        $data['content'] = "admin/alternatif/V_data_kedelai"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['kedelai'] = $this->M_kedelai->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    //tambah data kedelai
    function ac_add_kedelai()
    {
        $kedelai = $this->input->post('nama_kedelai');
        $config['upload_path'] = "./assets/images/kedelai"; //path folder file upload
        $config['allowed_types'] = 'jpg|jpeg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size']             = 2048; //ukuran file gambar
        $config['max_width']            = 1366; //maksimal lebar gambar
        $config['max_height']           = 1366; //maksimal tinggi gambar

        $this->load->library('upload', $config); //memanggil/meyiapkan library upload 
        if (!$this->upload->do_upload('foto')) { //gagal upload file
            $this->session->set_flashdata("warning", strip_tags($this->upload->display_errors()));
            redirect('c_kedelai');
        } else { //upload file
            $data_foto = array('foto' => $this->upload->data());
            $data = array(
                'nama_kedelai' => $kedelai,
                'foto_kedelai' => $data_foto['foto']['file_name'], //set file name ke variable foto_kedelai
            );
            $this->M_kedelai->input($data, 't_alternatif');
            $this->session->set_flashdata('success', 'Data kedelai berhasil ditambahkan!');
            redirect('c_kedelai');
        }
    }

    //aksi untuk merubah data kedelai
    public function ac_update_kedelai()
    {
        $id = $this->input->post('id_kedelai'); //mengambil data yang dikirim dari modal edit kedelai dengan method post
        $nama = $this->input->post('nama_kedelai');
        $ft_lama = $this->input->post('foto_lama'); //nama foto lama
        $where = "id_kedelai='" . $id . "'";

        $config['upload_path'] = "./assets/images/kedelai"; //path folder file upload
        $config['allowed_types'] = 'jpg|jpeg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size']             = 2048; //ukuran file gambar
        $config['max_width']            = 1366; //maksimal lebar gambar
        $config['max_height']           = 1366; //maksimal tinggi gambar

        $this->load->library('upload', $config); //memanggil/meyiapkan library upload 
        if ($_FILES["foto"]["error"] == 4) { //update data kedelai tanpa merubah gambar
            $data = array( //membuat array untuk menyimpan variable
                'nama_kedelai' => $nama //menyimpan data kedalam variable
            );
            $this->M_kedelai->update($where, $data, 't_alternatif'); //kirim data baru ke model
            $this->session->set_flashdata("success", "Data kedelai berhasil diperbaharui!"); //flashdata
            redirect('c_kedelai');
        } else {
            if (!$this->upload->do_upload('foto')) { //gagal upload file
                $this->session->set_flashdata("warning", strip_tags($this->upload->display_errors()));
                redirect('c_kedelai');
            } else { //upload file
                $data_foto = array('foto' => $this->upload->data());
                unlink('./assets/images/kedelai/' . $ft_lama); //menghapus file foto lama kedelai
                $data = array(
                    'nama_kedelai' => $nama,
                    'foto_kedelai' => $data_foto['foto']['file_name'], //set file name ke variable foto_kedelai
                );
                $this->M_kedelai->update($where, $data, 't_alternatif'); //kirim data baru ke model
                $this->session->set_flashdata("success", "Data kedelai berhasil diperbaharui!"); //flashdata
                redirect('c_kedelai');
            }
        }
    }

    //aksi hapus data kedelai
    public function ac_del_kedelai()
    {
        $id = $this->input->post('id_kedelai');
        $foto = $this->input->post('foto_lama');
        $this->M_kedelai->hapus($id); //memanggil fungsi hapus dari m_kedelai dengan parameter $id
        unlink('./assets/images/kedelai/' . $foto); //menghapus file foto lama kedelai
        $this->session->set_flashdata('success', 'Data kedelai berhasil dihapus!');
        redirect('c_kedelai');
    }
}
