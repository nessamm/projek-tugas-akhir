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
        $year = date('y'); // 26
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

    public function getTotalInput($id)
    {
        return $this->db
            ->from('anggaran_header')
            ->where('userinput', $id)
            ->count_all_results();
    }

    public function getTotalExport($user_id)
    {
        return $this->db
            ->from('export_log')
            ->where('user_id', $user_id)
            ->count_all_results();
    }

    var $table = 'tregister_ta';
    var $column_order = [null, 'fullname', 'username', 'kelas', 'gender'];

    private function get_datatables_query()
    {
        $this->db->from($this->table);

        // FILTER
        if (!empty($_POST['nama'])) {
            $this->db->like('fullname', $_POST['nama']);
        }

        if (!empty($_POST['username'])) {
            $this->db->like('username', $_POST['username']);
        }

        if (!empty($_POST['kelas'])) {
            $this->db->like('kelas', $_POST['kelas']);
        }

        if (!empty($_POST['gender'])) {
            if ($_POST['gender'] == 'L') {
                $this->db->like('gender', 'L');
            } elseif ($_POST['gender'] == 'P') {
                $this->db->like('gender', 'P');
            }
        }

        // search global
        if (!empty($_POST['search']['value'])) {
            $this->db->group_start();
            $this->db->like('fullname', $_POST['search']['value']);
            $this->db->or_like('username', $_POST['search']['value']);
            $this->db->group_end();
        }

        // order
        if (isset($_POST['order'])) {
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']],
                $_POST['order']['0']['dir']
            );
        } else {
            $this->db->order_by('id', 'asc');
        }
    }

    public function get_datatables()
    {
        $this->get_datatables_query();
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->get_datatables_query();
        return $this->db->get()->num_rows();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
