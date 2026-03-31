<?php
class M_master extends CI_Model
{
    public function insertKelas($data)
    {
        return $this->db->insert('mskelas', $data);
    }

    public function insertOrganisasi($data)
    {
        return $this->db->insert('msorganisasi', $data);
    }

    public function insertKategori($data)
    {
        return $this->db->insert('mskategori', $data);
    }

    public function insertSatuan($data)
    {
        return $this->db->insert('mssatuan', $data);
    }

    public function getData($table)
    {
        return $this->db->get($table)->result();
    }

   public function deleteData($table, $field, $id)
{
    return $this->db->delete($table, [$field => $id]);
}

}