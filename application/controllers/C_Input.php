<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Input extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_login');
        $this->load->model('M_input');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {

        $data['noticket']   = $this->M_login->generateTicket();
        $data['organisasi'] = $this->M_input->getOrganisasi();
        $data['kategori']   = $this->M_input->getKategori();
        $data['satuan']     = $this->M_input->getSatuan();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_Input', $data);
    }

    public function simpanHeader()
    {

        $noticket = $this->input->post('noticket');

        $data_header = [
            'noticket'   => $noticket,
            'judul'      => $this->input->post('judul'),
            'organisasi' => $this->input->post('organisasi'),
            'total'      => $this->input->post('total'),
            'userinput'  => $this->session->userdata('user_id')
        ];

        $simpanHeader = $this->M_input->simpanHeader($data_header);

        if (!$simpanHeader) {
            echo "Gagal simpan header";
            return;
        }

        $kategori     = $this->input->post('kategori');
        $nama_barang  = $this->input->post('nama_barang');
        $banyak       = $this->input->post('banyak');
        $satuan       = $this->input->post('satuan');
        $harga_satuan = $this->input->post('harga_satuan');
        $jumlah        = $this->input->post('jumlah');

        $data_detail = [];

        for ($i = 0; $i < count($kategori); $i++) {

            $jumlah = $banyak[$i] * $harga_satuan[$i];

            $data_detail[] = [
                'notiket'      => $noticket,
                'kategori'     => $kategori[$i],
                'nama_barang'  => $nama_barang[$i],
                'banyak'       => $banyak[$i],
                'satuan'       => $satuan[$i],
                'harga_satuan' => $harga_satuan[$i],
                'jumlah'       => $jumlah
            ];
        }

        $this->M_input->simpanDetail($data_detail);

        echo "success";
    }
}