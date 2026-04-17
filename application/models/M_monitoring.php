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

        // ✅ FILTER USER (WAJIB)
        $user_id = $this->session->userdata('user_id');
        $this->db->where('anggaran_header.userinput', $user_id);

        // filter tiket
        if (!empty($_POST['tiket'])) {
            $this->db->like('noticket', $_POST['tiket']);
        }

        // filter judul
        if (!empty($_POST['judul'])) {
            $this->db->like('judul', $_POST['judul']);
        }

        // filter organisasi (pakai CODE, bukan name)
        if (!empty($_POST['organisasi'])) {
            $this->db->where('anggaran_header.organisasi', $_POST['organisasi']);
        }

        // filter tanggal (periode)
        if (!empty($_POST['periode'])) {
            $this->db->like('anggaran_header.timeinput', $_POST['periode']);
        }

        // =====================================
        // 🔍 SEARCH DATATABLES (global search)
        // =====================================
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

        // =====================================
        // 🔽 ORDER
        // =====================================
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

    public function getRancangan($noticket)
    {
        return $this->db->get_where('anggarand', ['notiket' => $noticket])->result();
    }

    public function getRancanganExcel($noticket)
    {
        $this->db->select('
        a.*,
        b.name as kategori_nama,
        c.name as satuan_nama
    ');
        $this->db->from('anggarand a');
        $this->db->join('mskategori b', 'b.code = a.kategori', 'left');
        $this->db->join('mssatuan c', 'c.code = a.satuan', 'left');
        $this->db->where('a.notiket', $noticket);

        return $this->db->get()->result();
    }

    public function getRealisasi($noticket)
    {
        return $this->db->get_where('realisasid', ['notiket' => $noticket])->result();
    }

    public function getRealisasiExcel($noticket)
    {
        $this->db->select('
        a.*,
        b.name as kategori_nama,
        c.name as satuan_nama
    ');
        $this->db->from('realisasid a');
        $this->db->join('mskategori b', 'b.code = a.kategori', 'left');
        $this->db->join('mssatuan c', 'c.code = a.satuan', 'left');
        $this->db->where('a.notiket', $noticket);

        return $this->db->get()->result();
    }

    public function getHeaderByTicket($noticket)
    {
        $this->db->select('anggaran_header.*, msorganisasi.name as organisasi');
        $this->db->from('anggaran_header');
        $this->db->join('msorganisasi', 'msorganisasi.code = anggaran_header.organisasi', 'left');
        $this->db->where('anggaran_header.noticket', $noticket);

        return $this->db->get()->row();
    }

    public function simpanData($data)
    {
        $this->db->trans_start(); // 🔥 biar aman (rollback kalau gagal)

        // ================= HEADER =================
        $this->db->where('noticket', $data['noticket']);
        $this->db->update('anggaran_header', [
            'judul' => $data['judul'],
            'organisasi' => $data['organisasi'],
            'total' => $data['total'],
            'totalrealisasi' => $data['totalrealisasi'],
            'selisih' => $data['selisih']
        ]);

        // ================= HAPUS DETAIL LAMA =================
        $this->db->where('notiket', $data['noticket'])->delete('anggarand');
        $this->db->where('notiket', $data['noticket'])->delete('realisasid');

        // ================= INSERT RANCANGAN =================
        if (!empty($data['kategori_r'])) {
            for ($i = 0; $i < count($data['kategori_r']); $i++) {

                $this->db->insert('anggarand', [
                    'notiket' => $data['noticket'], // 🔥 mapping dari noticket → notiket
                    'kategori' => $data['kategori_r'][$i],
                    'nama_barang' => $data['nama_barang_r'][$i],
                    'banyak' => $data['banyak_r'][$i],
                    'satuan' => $data['satuan_r'][$i],
                    'harga_satuan' => $data['harga_r'][$i],
                    'jumlah' => preg_replace('/[^0-9]/', '', $data['jumlah_r'][$i])
                ]);
            }
        }

        // ================= INSERT REALISASI =================
        if (!empty($data['kategori_re'])) {
            for ($i = 0; $i < count($data['kategori_re']); $i++) {

                $this->db->insert('realisasid', [
                    'notiket' => $data['noticket'], // 🔥 mapping juga
                    'kategori' => $data['kategori_re'][$i],
                    'nama_barang' => $data['nama_barang_re'][$i],
                    'banyak' => $data['banyak_re'][$i],
                    'satuan' => $data['satuan_re'][$i],
                    'harga_satuan' => $data['harga_re'][$i],
                    'jumlah' => preg_replace('/[^0-9]/', '', $data['jumlah_re'][$i])
                ]);
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function update_realisasi($noticket, $data, $totalRealisasi, $selisih)
    {
        // 🔥 hapus data lama
        $this->db->where('notiket', $noticket);
        $this->db->delete('realisasid');

        // 🔥 insert ulang
        for ($i = 0; $i < count($data['kategori']); $i++) {

            $insert = [
                'notiket'     => $noticket,
                'kategori'     => $data['kategori'][$i],
                'nama_barang'  => $data['nama'][$i],
                'banyak'       => $data['banyak'][$i],
                'satuan'       => $data['satuan'][$i],
                'harga_satuan' => $data['harga'][$i],
                'jumlah'       => preg_replace('/[^0-9]/', '', $data['jumlah'][$i])
            ];

            $this->db->insert('realisasid', $insert);
        }

        // 🔥 update header
        $this->db->where('noticket', $noticket);
        $this->db->update('anggaran_header', [
            'totalrealisasi' => $totalRealisasi,
            'selisih'        => $selisih
        ]);
    }
}