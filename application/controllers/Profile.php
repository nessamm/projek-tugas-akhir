<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $role = $this->session->userdata('role');
        $id   = $this->session->userdata('user_id');

        // kalau admin
        if ($role == 1) {
            $data['user'] = $this->M_login->getUserById($id);

            $this->load->view('layout/header');
            $this->load->view('admin/V_AdminPengguna', $data);
        }

        // kalau user biasa
        if ($role == 2) {
            $data['user'] = $this->M_login->getUserById($id);

            $this->load->view('layout/header');
            $this->load->view('auth/profile', $data);
        }
    }
}