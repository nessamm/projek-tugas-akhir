<?php
class M_login extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('tregister_ta', $data);
    }

    public function checkUsername($username)
    {
        return $this->db
            ->where('username', $username)
            ->get('tregister_ta')
            ->row();
    }

    public function checkEmail($email)
    {
        return $this->db
            ->where('email', $email)
            ->get('tregister_ta')
            ->row();
    }

    public function getByEmail($email)
    {
        return $this->db->get_where('tregister_ta', ['email' => $email])->row();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('tregister_ta', ['id' => $id])->row();
    }
}
