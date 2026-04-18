<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_master');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {

        $data['kelas']      = $this->M_master->getData('mskelas');
        $data['organisasi'] = $this->M_master->getData('msorganisasi');
        $data['kategori']   = $this->M_master->getData('mskategori');
        $data['satuan']     = $this->M_master->getData('mssatuan');

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/V_Master', $data);
    }

    public function simpanKelas()
    {
        $nama      = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');

        // VALIDASI
        if (!$nama) {
            echo "Nama kelas wajib diisi";
            return;
        }

        $data = [
            'name' => $nama,
            'description' => $deskripsi,
        ];

        $insert = $this->M_master->insertKelas($data);

        if ($insert) {
            echo "success";
        } else {
            echo "Gagal menyimpan data";
        }
    }

    public function simpanOrganisasi()
    {
        $nama      = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');

        // VALIDASI
        if (!$nama) {
            echo "Nama organisasi wajib diisi";
            return;
        }

        $data = [
            'name' => $nama,
            'description' => $deskripsi,
        ];

        $insert = $this->M_master->insertOrganisasi($data);

        if ($insert) {
            echo "success";
        } else {
            echo "Gagal menyimpan data";
        }
    }

    public function simpanKategori()
    {
        $nama      = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');

        // VALIDASI
        if (!$nama) {
            echo "Nama kategori wajib diisi";
            return;
        }

        $data = [
            'name' => $nama,
            'description' => $deskripsi,
        ];

        $insert = $this->M_master->insertKategori($data);

        if ($insert) {
            echo "success";
        } else {
            echo "Gagal menyimpan data";
        }
    }

    public function simpanSatuan()
    {
        $nama = $this->input->post('nama');

        // VALIDASI
        if (!$nama) {
            echo "Nama satuan wajib diisi";
            return;
        }

        $data = [
            'name' => $nama
        ];

        $insert = $this->M_master->insertSatuan($data);

        if ($insert) {
            echo "success";
        } else {
            echo "Gagal menyimpan data";
        }
    }

    // public function deleteData()
    // {
    //     $table = $this->input->post('table');
    //     $no = $this->input->post('code');
    //     $id = $this->input->post('id');

    //     if (!$table || !$field || !$id) {
    //         echo "Parameter tidak lengkap";
    //         return;
    //     }

    //     $delete = $this->M_master->deleteData($table, $field, $id);

    //     echo $delete ? "success" : "Gagal menghapus data";
    // }

    public function deleteData()
{
    $table  = $this->input->post('table');
    $id     = $this->input->post('id'); 

    if (!$table || !$id) {
        echo "Parameter tidak lengkap";
        return;
    }

    $validTables = ['mskelas', 'msorganisasi', 'mskategori', 'mssatuan'];
    if (!in_array($table, $validTables)) {
        echo "Tabel tidak valid";
        return;
    }

    $field = 'code';

    $delete = $this->M_master->deleteData($table, $field, $id);

    echo $delete ? "success" : "Gagal menghapus data";
}

}