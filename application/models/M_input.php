<?php
class M_input extends CI_Model
{

    public function simpanHeader($data)
    {
        return $this->db->insert('anggaran_header', $data);
    }

    public function simpanDetail($data)
    {
        return $this->db->insert_batch('anggarand', $data);
    }

    public function getOrganisasi()
    {
        return $this->db->get('msorganisasi')->result();
    }

    public function getKategori()
    {
        return $this->db->get('mskategori')->result();
    }

    public function getSatuan()
    {
        return $this->db->get('mssatuan')->result();
    }

}