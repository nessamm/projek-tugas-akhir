<?php
class M_input extends CI_Model
{

    public function simpanHeader($data)
    {
        return $this->db->insert('anggaran_header', $data);
    }

}