<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_dashboard_admin extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_dashboard_admin di jalankan
        parent::__construct();
        $this->load->model('M_dashboard_admin');
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/c_login'));
        }
    }

    public function index()
    {
        $data['content'] = "admin/V_beranda";

        //konfigurasi pagination
        $config['base_url'] = site_url('c_dashboard_admin/index'); //site url
        $config['total_rows'] = $this->db->count_all('t_post'); //total row
        $config['per_page'] = 4;  //record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];

        // BootStrap v4 pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = $this->uri->segment(3);

        $data['data'] = $this->M_dashboard_admin->get_post($config["per_page"], $data['page'])->result();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/main', $data);
    }

    public function petunjuk()
    {
        $this->load->view('V_petunjuk');
    }

    //aksi untuk merubah data user
    public function ac_update_profile()
    {
        $id = $this->input->post('id'); //mengambil data yang dikirim dari modal edit user dengan method post
        $uname = $this->input->post('user');
        $pwd_lama = $this->input->post('pass_lama');
        $pwd_baru = $this->input->post('pass');

        $query = $this->M_dashboard_admin->cek_pwd($id, $pwd_lama);
        if ($query->num_rows() > 0) {
            $where = "id_admin='" . $id . "'";
            $data = array( //membuat array untuk menyimpan variable
                'username' => $uname, //menyimpan data kedalam variable
                'password' => $pwd_baru //menyimpan data kedalam variable
            );
            $this->M_dashboard_admin->update($where, $data, 't_admin'); //kirim data baru ke model
            $this->session->set_flashdata("success", "Silahkan login dengan data yang baru!"); //flashdata
            redirect('c_login');
        } else {
            $this->session->set_flashdata("warning", "Password lama salah!"); //flashdata
            redirect('c_dashboard_admin');
        }
    }

    public function profile()
    {
        $data['content'] = "admin/V_profile";
        $this->load->view('admin/main', $data);
    }

    public function ac_update_nama($id)
    {
        $nama = $this->input->post('nama'); //mengambil data yang dikirim dari halaman edit user dengan method post
        $where = "id_admin='" . $id . "'";
        $data = array( //membuat array untuk menyimpan variable
            'nama_admin' => $nama //menyimpan data kedalam variable
        );
        $this->M_dashboard_admin->update($where, $data, 't_admin'); //kirim data baru ke model
        $this->session->set_flashdata("success", "Silahkan login kembali untuk melihat perubahan!"); //flashdata
        redirect('c_dashboard_admin/profile');
    }

    public function add_post()
    {
        $data['content'] = "admin/V_add_post";
        $this->load->view('admin/main', $data);
    }

    //aksi tambah post bibit
    function ac_add_post()
    {
        $judul = $this->input->post('judul');
        $ket = $this->input->post('keterangan');
        $config['upload_path'] = "./assets/images/post/"; //path folder file upload
        $config['allowed_types'] = 'jpg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size']             = 2048; //ukuran file gambar
        $config['max_width']            = 1366; //maksimal lebar gambar
        $config['max_height']           = 1366; //maksimal tinggi gambar

        $this->load->library('upload', $config); //memanggil/meyiapkan library upload 
        if (!$this->upload->do_upload('gambar')) { //gagal upload file
            $this->session->set_flashdata("warning", "Harap Lihat Ketentuan Upload Gambar!!");
            redirect('c_dashboard_admin/add_post');
        } else { //upload file
            $ft = array('foto' => $this->upload->data());
            $data = array(
                'judul_post' => $judul,
                'keterangan_post' => $ket,
                'gambar_post' => $ft['foto']['file_name'] //set file name ke variable foto_kedelai
            );
            $this->M_dashboard_admin->input($data, 't_post');
            $this->session->set_flashdata('success', 'Post berhasil ditambahkan!');
            redirect('c_dashboard_admin');
        }
    }

    //edit post
    public function edit_post($id)
    {
        $data['content'] = "admin/V_edit_post";
        $data['post'] = $this->M_dashboard_admin->get_post_by($id)->row();
        $this->load->view('admin/main', $data);
    }

    //aksi edit post
    function ac_edit_post($id)
    {
        $judul = $this->input->post('judul');
        $ket = $this->input->post('keterangan');
        $g_lama = $this->input->post('gambar_lama');
        $config['upload_path'] = "./assets/images/post/"; //path folder file upload
        $config['allowed_types'] = 'jpg|jpeg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size']             = 2048; //ukuran file gambar
        $config['max_width']            = 1366; //maksimal lebar gambar
        $config['max_height']           = 1366; //maksimal tinggi gambar

        $where = array('id_post' => $id);

        $this->load->library('upload', $config); //memanggil/meyiapkan library upload
        if ($_FILES['gambar']['size'] == 0) { //jika gambar kosong/ tidak mengupload gambar
            $data = array(
                'judul_post' => $judul,
                'keterangan_post' => $ket
            );
            $this->M_dashboard_admin->update($where, $data, 't_post');
            $this->session->set_flashdata('success', 'Post berhasil perbaharui!');
            redirect('c_dashboard_admin');
        } else { //jika mengupload gambar baru
            if (!$this->upload->do_upload('gambar')) { //gagal upload file
                $this->session->set_flashdata("warning", strip_tags($this->upload->display_errors()));
                redirect('c_dashboard_admin/edit_post/' . $id);
            } else { //upload file
                $ft = array('foto' => $this->upload->data());
                unlink('./assets/images/post/' . $g_lama);
                $data = array(
                    'judul_post' => $judul,
                    'keterangan_post' => $ket,
                    'gambar_post' => $ft['foto']['file_name'] //set file name ke variable foto_kedelai
                );
                $this->M_dashboard_admin->update($where, $data, 't_post');
                $this->session->set_flashdata('success', 'Post berhasil perbaharui!');
                redirect('c_dashboard_admin');
            }
        }
    }

    //aksi hapus post
    public function ac_del_post()
    {
        $id = $this->input->post('id_post');
        $foto = $this->input->post('foto_lama');
        $where = array('id_post' => $id);
        $this->M_dashboard_admin->hapus($where, 't_post'); //memanggil fungsi hapus dari M_dashboard_admin dengan parameter $id
        unlink('./assets/images/post/' . $foto); //menghapus file foto lama
        $this->session->set_flashdata('success', 'Posting berhasil dihapus!');
        redirect('c_dashboard_admin');
    }

    //lihat post
    public function lihat_post($id)
    {
        $data['content'] = "admin/V_lihat_post";
        $data['post'] = $this->M_dashboard_admin->get_post_by($id)->row();
        $this->load->view('admin/main', $data);
    }

    public function petunjuk_ahp()
    {
        $data['content'] = "admin/petunjuk/V_petunjuk_ahp";
        $data['data'] = $this->M_dashboard_admin->get_data('t_petunjuk_ahp')->result();
        $this->load->view('admin/main', $data);
    }

    public function add_petunjuk_ahp()
    {
        $data['content'] = "admin/petunjuk/V_add_petunjuk_ahp";
        $this->load->view('admin/main', $data);
    }

    function ac_add_petunjuk_ahp()
    {
        $ket = $this->input->post('keterangan');
        $data = array(
            'p_ahp_keterangan' => $ket
        );
        $this->M_dashboard_admin->input($data, 't_petunjuk_ahp');
        $this->session->set_flashdata('success', 'Petunjuk berhasil ditambahkan!');
        redirect('c_dashboard_admin/petunjuk_ahp');
    }

    public function edit_petunjuk_ahp($id)
    {
        $where = array('id_p_ahp' => $id);
        $data['data'] = $this->M_dashboard_admin->get_data_by('t_petunjuk_ahp', $where)->row();
        $data['content'] = "admin/petunjuk/V_edit_petunjuk_ahp";
        $this->load->view('admin/main', $data);
    }

    function ac_edit_petunjuk_ahp($id)
    {
        $ket = $this->input->post('keterangan');
        $where = array('id_p_ahp' => $id);
        $data = array(
            'p_ahp_keterangan' => $ket
        );
        $this->M_dashboard_admin->update($where, $data, 't_petunjuk_ahp');
        $this->session->set_flashdata('success', 'Petunjuk berhasil perbaharui!');
        redirect('c_dashboard_admin/petunjuk_ahp');
    }

    public function ac_del_petunjuk_ahp()
    {
        $id = $this->input->post('id_petunjuk');
        $where = array('id_p_ahp' => $id);
        $hasil = $this->M_dashboard_admin->hapus($where, 't_petunjuk_ahp'); //memanggil fungsi hapus dari M_dashboard_admin dengan parameter $id
        $this->session->set_flashdata('success', 'Petunjuk berhasil dihapus!');
        redirect('c_dashboard_admin/petunjuk_ahp');
    }



    public function petunjuk_spk()
    {
        $data['content'] = "admin/petunjuk/V_petunjuk_spk";
        $data['data'] = $this->M_dashboard_admin->get_data('t_petunjuk_spk')->result();
        $this->load->view('admin/main', $data);
    }

    public function add_petunjuk_spk()
    {
        $data['content'] = "admin/petunjuk/V_add_petunjuk_spk";
        $this->load->view('admin/main', $data);
    }

    function ac_add_petunjuk_spk()
    {
        $ket = $this->input->post('keterangan');
        $data = array(
            'p_spk_keterangan' => $ket
        );
        $this->M_dashboard_admin->input($data, 't_petunjuk_spk');
        $this->session->set_flashdata('success', 'Petunjuk berhasil ditambahkan!');
        redirect('c_dashboard_admin/petunjuk_spk');
    }

    public function edit_petunjuk_spk($id)
    {
        $where = array('id_p_spk' => $id);
        $data['data'] = $this->M_dashboard_admin->get_data_by('t_petunjuk_spk', $where)->row();
        $data['content'] = "admin/petunjuk/V_edit_petunjuk_spk";
        $this->load->view('admin/main', $data);
    }

    function ac_edit_petunjuk_spk($id)
    {
        $ket = $this->input->post('keterangan');
        $where = array('id_p_spk' => $id);
        $data = array(
            'p_spk_keterangan' => $ket
        );
        $this->M_dashboard_admin->update($where, $data, 't_petunjuk_spk');
        $this->session->set_flashdata('success', 'Petunjuk berhasil perbaharui!');
        redirect('c_dashboard_admin/petunjuk_spk');
    }

    public function ac_del_petunjuk_spk()
    {
        $id = $this->input->post('id_keterangan');
        $where = array('id_p_spk' => $id);
        $hasil = $this->M_dashboard_admin->hapus($where, 't_petunjuk_spk'); //memanggil fungsi hapus dari M_dashboard_admin dengan parameter $id
        $this->session->set_flashdata('success', 'Petunjuk berhasil dihapus!');
        redirect('c_dashboard_admin/petunjuk_spk');
    }
}
