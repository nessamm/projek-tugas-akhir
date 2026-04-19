<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        $this->load->model('M_monitoring');
        $this->load->model('M_input');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['organisasi'] = $this->M_input->getOrganisasi();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_Monitoring', $data);
    }

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
                "organisasi" => $row->organisasi_nama,
                "timeinput" => date('d M Y H:i:s', strtotime($row->timeinput))
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_monitoring->count_all(),
            "recordsFiltered" => $this->M_monitoring->count_filtered(),
            "data" => $data
        ]);
    }

    public function edit($id)
    {
        $header = $this->M_monitoring->getById($id);

        if (!$header) {
            show_404();
            return;
        }

        if ($header->userinput != $this->session->userdata('user_id')) {
            show_error('Unauthorized access', 403);
            return;
        }

        $data['header'] = $header;
        $data['detail_rancangan'] = $this->M_monitoring->getRancangan($header->noticket);
        $data['detail_realisasi'] = $this->M_monitoring->getRealisasi($header->noticket);

        $data['organisasi'] = $this->M_input->getOrganisasi();
        $data['kategori'] = $this->M_input->getKategori();
        $data['satuan'] = $this->M_input->getSatuan();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('V_EditMonitoring', $data);
    }

    public function simpan()
    {
        $data = [
            'noticket' => $this->input->post('noticket'),
            'judul' => $this->input->post('judul'),
            'organisasi' => $this->input->post('organisasi'),
            'total' => $this->input->post('total'),
            'totalrealisasi' => $this->input->post('totalrealisasi'),
            'selisih' => $this->input->post('selisih'),

            // RANCANGAN
            'kategori_r' => $this->input->post('kategori_rancangan'),
            'nama_barang_r' => $this->input->post('nama_barang_rancangan'),
            'banyak_r' => $this->input->post('banyak_rancangan'),
            'satuan_r' => $this->input->post('satuan_rancangan'),
            'harga_r' => $this->input->post('harga_satuan_rancangan'),
            'jumlah_r' => $this->input->post('jumlah_rancangan'),

            // REALISASI
            'kategori_re' => $this->input->post('kategori_realisasi'),
            'nama_barang_re' => $this->input->post('nama_barang_realisasi'),
            'banyak_re' => $this->input->post('banyak_realisasi'),
            'satuan_re' => $this->input->post('satuan_realisasi'),
            'harga_re' => $this->input->post('harga_satuan_realisasi'),
            'jumlah_re' => $this->input->post('jumlah_realisasi'),
        ];

        $result = $this->M_monitoring->simpanData($data);

        echo $result ? "success" : "gagal simpan";
    }

    public function update_realisasi()
    {
        $noticket = $this->input->post('noticket');

        $data = [
            'kategori' => $this->input->post('kategori_realisasi'),
            'nama' => $this->input->post('nama_barang_realisasi'),
            'banyak' => $this->input->post('banyak_realisasi'),
            'satuan' => $this->input->post('satuan_realisasi'),
            'harga' => $this->input->post('harga_satuan_realisasi'),
            'jumlah' => $this->input->post('jumlah_realisasi'),
        ];

        $totalRealisasi = $this->input->post('totalrealisasi');
        $selisih = $this->input->post('selisih');

        $this->M_monitoring->update_realisasi($noticket, $data, $totalRealisasi, $selisih);

        echo "success";
    }

    public function delete($id)
    {
        $header = $this->M_monitoring->getById($id);

        if (!$header) {
            echo "Data tidak ditemukan";
            return;
        }

        $this->db->where('notiket', $header->noticket);
        $this->db->delete('anggarand');
        $this->db->where('id', $id);
        $this->db->delete('anggaran_header');

        echo "success";
    }
}