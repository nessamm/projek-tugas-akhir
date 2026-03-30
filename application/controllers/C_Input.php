<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Input extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_login');
        $this->load->model('M_input');
    }

    public function index()
    {

        $data['noticket'] = $this->M_login->generateTicket();
        $data['organisasi'] = $this->M_input->getOrganisasi();
        $data['kategori'] = $this->M_input->getKategori();
        $data['satuan'] = $this->M_input->getSatuan();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_Input', $data);
    }

    public function simpanHeader()
    {

        $data = [
            'noticket'   => $this->input->post('noticket'),
            'judul'      => $this->input->post('judul'),
            'organisasi' => $this->input->post('organisasi'),
            'total'      => 0,
            'userinput'  => $this->session->userdata('user_id')
        ];

        $simpan = $this->M_input->simpanHeader($data);

        if ($simpan) {
            echo "success";
        } else {
            echo "gagal";
        }
    }
}