<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['kelas'] = $this->M_login->getKelas();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/V_Pengguna', $data);
    }

    public function getData()
    {
        $list = $this->M_login->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $row) {
            $no++;

            $data[] = [
                "fullname" => $row->fullname,
                "username" => $row->username,
                "kelas" => $row->nama_kelas,
                "gender" => $row->gender == 'L' ? 'Laki-laki' : 'Perempuan'
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_login->count_all(),
            "recordsFiltered" => $this->M_login->count_filtered(),
            "data" => $data
        ]);
    }

}