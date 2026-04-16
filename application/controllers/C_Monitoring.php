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
        $this->load->model('M_input');
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
                "id" => $row->id,
                "no" => $no,
                "noticket" => $row->noticket,
                "judul" => $row->judul,
                "organisasi" => $row->organisasi, // sudah join (nama, bukan code)
                "timeinput" => date('d M Y H:i:s', strtotime($row->timeinput))
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

    public function edit($id)
    {

        $header = $this->M_monitoring->getById($id);
        $data['header'] = $header;
        $data['detail'] = $this->M_monitoring->getDetailByNoticket($header->noticket);

        // 🔥 dropdown
        $data['organisasi'] = $this->M_input->getOrganisasi();
        $data['kategori']   = $this->M_input->getKategori();
        $data['satuan']     = $this->M_input->getSatuan();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_EditMonitoring', $data);
    }
}