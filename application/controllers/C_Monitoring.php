<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_monitoring');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_Monitoring');
    }

    // ambil data untuk datatables
    public function getData()
    {
        $list = $this->M_monitoring->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $row) {
            $no++;

            $data[] = [
                "no" => $no,
                "noticket" => $row->noticket,
                "judul" => $row->judul,
                "organisasi" => $row->organisasi, // sudah join (nama, bukan code)
                "timeinput" => date('d M Y H:i:s', strtotime($row->timeinput)),
                "action" => '
                    <button class="bg-yellow-100 text-yellow-600 border border-yellow-500 px-2 py-2 rounded-lg"><img src="'.base_url('assets/icons/pencil.svg').'" class="w-4 h-4"></button>
                    <button class="bg-green-100 text-green-600 border border-green-500 px-2 py-2 rounded-lg"><img src="'.base_url('assets/icons/download.svg').'" class="w-4 h-4"></button>
                    <button class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><img src="'.base_url('assets/icons/trash.svg').'" class="w-4 h-4"></button>
                '
            ];
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_monitoring->count_all(),
            "recordsFiltered" => $this->M_monitoring->count_filtered(),
            "data" => $data
        ];

        echo json_encode($output);
    }
}