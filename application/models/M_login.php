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

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tregister_ta', $data);
    }

    public function generateTicket()
    {
        $year  = date('y'); // 26
        $month = date('m'); // 03

        $prefix = "RAB" . $year . $month;

        $this->db->select('RIGHT(noticket,2) as urutan', false);
        $this->db->like('noticket', $prefix, 'after');
        $this->db->order_by('noticket', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('anggaran_header');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $urutan = intval($data->urutan) + 1;
        } else {
            $urutan = 1;
        }

        $urutan = str_pad($urutan, 2, "0", STR_PAD_LEFT);

        return $prefix . $urutan;
    }

    public function getKelas()
    {
        return $this->db->get('mskelas')->result();
    }
}
