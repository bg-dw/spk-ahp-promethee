<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_dashboard_user extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_dashboard_admin di jalankan
        parent::__construct();
        $this->load->model('M_dashboard_admin');
    }

    public function index()
    {
        $data['content'] = "user/V_beranda";

        //konfigurasi pagination
        $config['base_url'] = site_url('c_dashboard_user/index'); //site url
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
        $this->load->view('user/main', $data);
    }

    public function petunjuk()
    {
        $this->load->view('V_petunjuk');
    }

    //lihat post
    public function lihat_post($id)
    {
        $data['content'] = "user/V_lihat_post";
        $data['post'] = $this->M_dashboard_admin->get_post_by($id)->row();
        $this->load->view('user/main', $data);
    }

    public function petunjuk_ahp()
    {
        $data['content'] = "user/petunjuk/V_petunjuk_ahp";
        $data['data'] = $this->M_dashboard_admin->get_data('t_petunjuk_ahp')->result();
        $this->load->view('user/main', $data);
    }

    public function petunjuk_spk()
    {
        $data['content'] = "user/petunjuk/V_petunjuk_spk";
        $data['data'] = $this->M_dashboard_admin->get_data('t_petunjuk_spk')->result();
        $this->load->view('user/main', $data);
    }
}
