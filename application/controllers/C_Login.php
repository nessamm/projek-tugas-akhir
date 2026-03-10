<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('auth/register');
    }

    public function register()
    {
        if ($this->input->post()) {

            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $kelas    = $this->input->post('kelas');
            $gender   = $this->input->post('gender');
            $password = $this->input->post('password');
            $confirm  = $this->input->post('confirm_password');

            if (!$fullname || !$username || !$email || !$gender || !$password) {
                echo "Semua field wajib diisi";
                return;
            }

            if ($password !== $confirm) {
                echo "Password tidak sama";
                return;
            }

            if ($this->M_login->checkUsername($username)) {
                echo "Username sudah digunakan";
                return;
            }

            if ($this->M_login->checkEmail($email)) {
                echo "Email sudah digunakan";
                return;
            }

            $data = [
                'fullname'   => $fullname,
                'username'   => $username,
                'email'      => $email,
                'kelas'      => $kelas,
                'gender'     => $gender,
                'password'   => password_hash($password, PASSWORD_DEFAULT),
                'role'       => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->M_login->insert($data);

            echo "success";
            return;
        }

        // INI WAJIB ADA
        $this->load->view('layout/header');
        $this->load->view('auth/register');
    }

    public function login()
    {
        if ($this->input->post()) {

            $email    = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));

            if (!$email || !$password) {
                echo "Email dan Password wajib diisi";
                return;
            }

            $user = $this->M_login->getByEmail($email);

            if (!$user) {
                echo "Email tidak ditemukan";
                return;
            }

            if (!password_verify($password, $user->password)) {
                echo "Password salah";
                return;
            }

            // Simpan session
            $this->session->set_userdata([
                'user_id'  => $user->id,
                'fullname' => $user->fullname,
                'username' => $user->username,
                'role'     => $user->role,
                'logged_in' => true
            ]);

            echo "success";
            return;
        }

        $this->load->view('layout/header');
        $this->load->view('auth/login');
    }

    public function profile()
    {
        $id = $this->session->userdata('user_id');

        $data['user'] = $this->M_login->getUserById($id);

        $this->load->view('layout/header');
        $this->load->view('auth/profile', $data);
    }

    public function updateProfile()
    {

        $id = $this->session->userdata('user_id');

        if (!$id) {
            echo "User tidak ditemukan";
            return;
        }

        $fullname = $this->input->post('fullname');
        $username = $this->input->post('username');
        $kelas    = $this->input->post('kelas');

        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'kelas'    => $kelas,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->M_login->updateUser($id, $data);

        echo "success";
    }
}
