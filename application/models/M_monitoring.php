<?php
class M_monitoring extends CI_Model
{

    var $table = 'anggaran_header';

    // kolom untuk sorting
    var $column_order = ['anggaran_header.id', 'noticket', 'judul', 'msorganisasi.name', 'timeinput'];

    // kolom untuk search
    var $column_search = ['noticket', 'judul', 'msorganisasi.name'];

    var $order = ['timeinput' => 'desc'];

    private function _get_query()
    {
        $this->db->select('anggaran_header.*, msorganisasi.name as organisasi');
        $this->db->from($this->table);
        $this->db->join('msorganisasi', 'msorganisasi.code = anggaran_header.organisasi', 'left');

        // ✅ FILTER USER (PENTING BANGET)
        $user_id = $this->session->userdata('user_id');
        $this->db->where('anggaran_header.userinput', $user_id);

        // 🔍 SEARCH
        if (!empty($_POST['search']['value'])) {
            $search = $_POST['search']['value'];

            $this->db->group_start();
            foreach ($this->column_search as $i => $item) {
                if ($i === 0) {
                    $this->db->like($item, $search);
                } else {
                    $this->db->or_like($item, $search);
                }
            }
            $this->db->group_end();
        }

        // 🔽 ORDER
        if (isset($_POST['order'])) {
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']],
                $_POST['order']['0']['dir']
            );
        } else {
            $this->db->order_by('timeinput', 'desc');
        }
    }

    public function get_datatables()
    {
        $this->_get_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->_get_query();
        return $this->db->get()->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getById($id)
    {
        $this->db->select('anggaran_header.*, msorganisasi.name as organisasi');
        $this->db->from($this->table);
        $this->db->join('msorganisasi', 'msorganisasi.code = anggaran_header.organisasi', 'left');

        // 🔥 filter berdasarkan id
        $this->db->where('anggaran_header.id', $id);

        // 🔥 (PENTING) filter user juga biar aman
        $user_id = $this->session->userdata('user_id');
        $this->db->where('anggaran_header.userinput', $user_id);

        return $this->db->get()->row();
    }

    public function getDetailById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('anggarand')
            ->result();
    }

    public function getDetailByNoticket($noticket)
    {
        return $this->db
            ->where('notiket', $noticket)
            ->get('anggarand')
            ->result();
    }
}