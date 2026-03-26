<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar_admin');
        $this->load->view('admin/V_Pengguna');
    }
}