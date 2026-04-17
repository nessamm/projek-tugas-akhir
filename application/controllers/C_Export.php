<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Export extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('M_monitoring');
        $this->load->model('M_input');
    }

    public function export_excel($noticket)
    {
        require_once FCPATH . 'vendor/autoload.php';
        $this->load->model('M_monitoring');

        $header = $this->M_monitoring->getHeaderByTicket($noticket);
        $data   = $this->M_monitoring->getRancanganExcel($noticket);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ================= STYLE =================
        $bold = [
            'font' => ['bold' => true]
        ];

        $center = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        // ================= TITLE =================
        $sheet->setCellValue('A1', 'RANCANGAN ANGGARAN BIAYA');
        $sheet->mergeCells('A1:D1');

        $sheet->getStyle('A1')->applyFromArray($bold);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->getStyle('A1')->applyFromArray($center);

        $sheet->getRowDimension(2)->setRowHeight(10);

        // ================= HEADER INFO =================
        $sheet->setCellValue('A3', 'NOTICKET');
        $sheet->setCellValue('B3', ': ' . ($header->noticket ?? '-'));
        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('A4', 'KEGIATAN');
        $sheet->setCellValue('B4', ': ' . ($header->judul ?? '-'));
        $sheet->mergeCells('B4:D4');

        $sheet->setCellValue('A5', 'ORGANISASI');
        $sheet->setCellValue('B5', ': ' . ($header->organisasi ?? '-'));
        $sheet->mergeCells('B5:D5');

        $sheet->getStyle('A3:A5')->applyFromArray($bold);

        $sheet->getStyle('A5:D5')->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->getRowDimension(6)->setRowHeight(10);

        // ================= TABLE HEADER =================
        $sheet->setCellValue('A7', 'NO');
        $sheet->setCellValue('B7', 'Kategori');
        $sheet->setCellValue('C7', 'Nama Barang');
        $sheet->setCellValue('D7', 'Banyak');
        $sheet->setCellValue('E7', 'Satuan');
        $sheet->setCellValue('F7', 'Harga Satuan');
        $sheet->setCellValue('G7', 'Jumlah');

        $sheet->getStyle('A7:G7')->applyFromArray($bold);
        $sheet->getStyle('A7:G7')->applyFromArray($center);

        // ================= DATA =================
        $row = 8;
        $no = 1;

        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d->kategori_nama ?? '-');
            $sheet->setCellValue('C' . $row, $d->nama_barang);
            $sheet->setCellValue('D' . $row, $d->banyak);
            $sheet->setCellValue('E' . $row, $d->satuan_nama ?? '-');
            $sheet->setCellValue('F' . $row, $d->harga_satuan);
            $sheet->setCellValue('G' . $row, $d->jumlah);
            $row++;
        }

        // ================= TOTAL =================
        $total = $header->total ?? 0;

        $sheet->setCellValue('F' . $row, 'TOTAL');
        $sheet->setCellValue('G' . $row, $total);

        $sheet->getStyle('F' . $row . ':G' . $row)->applyFromArray($bold);
        $sheet->getStyle('F' . $row . ':G' . $row)->applyFromArray($center);

        $sheet->getStyle('F' . $row . ':G' . $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // ================= BORDER TABLE =================
        $sheet->getStyle('A7:G' . $row)
            ->applyFromArray($borderStyle);

        // ================= AUTO SIZE =================
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // ================= FORMAT ANGKA =================
        $sheet->getStyle('D8:G' . $row)
            ->getNumberFormat()
            ->setFormatCode('#,##0');

        // ================= CLEAN OUTPUT =================
        if (ob_get_length()) ob_end_clean();

        $filename = "Rancangan_{$noticket}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function export_excel_realisasi($noticket)
    {
        require_once FCPATH . 'vendor/autoload.php';
        $this->load->model('M_monitoring');

        $header = $this->M_monitoring->getHeaderByTicket($noticket);
        $data   = $this->M_monitoring->getRealisasiExcel($noticket);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ================= STYLE =================
        $bold = [
            'font' => ['bold' => true]
        ];

        $center = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        // ================= TITLE =================
        $sheet->setCellValue('A1', 'REALISASI ANGGARAN BIAYA');
        $sheet->mergeCells('A1:D1');

        $sheet->getStyle('A1')->applyFromArray($bold);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->getStyle('A1')->applyFromArray($center);

        $sheet->getRowDimension(2)->setRowHeight(10);

        // ================= HEADER INFO =================
        $sheet->setCellValue('A3', 'NOTICKET');
        $sheet->setCellValue('B3', ': ' . ($header->noticket ?? '-'));
        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('A4', 'KEGIATAN');
        $sheet->setCellValue('B4', ': ' . ($header->judul ?? '-'));
        $sheet->mergeCells('B4:D4');

        $sheet->setCellValue('A5', 'ORGANISASI');
        $sheet->setCellValue('B5', ': ' . ($header->organisasi ?? '-'));
        $sheet->mergeCells('B5:D5');

        $sheet->getStyle('A3:A5')->applyFromArray($bold);

        $sheet->getStyle('A5:D5')->getBorders()->getBottom()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->getRowDimension(6)->setRowHeight(10);

        // ================= TABLE HEADER =================
        $sheet->setCellValue('A7', 'NO');
        $sheet->setCellValue('B7', 'Kategori');
        $sheet->setCellValue('C7', 'Nama Barang');
        $sheet->setCellValue('D7', 'Banyak');
        $sheet->setCellValue('E7', 'Satuan');
        $sheet->setCellValue('F7', 'Harga Satuan');
        $sheet->setCellValue('G7', 'Jumlah');

        $sheet->getStyle('A7:G7')->applyFromArray($bold);
        $sheet->getStyle('A7:G7')->applyFromArray($center);

        // ================= DATA =================
        $row = 8;
        $no = 1;

        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d->kategori_nama ?? '-');
            $sheet->setCellValue('C' . $row, $d->nama_barang);
            $sheet->setCellValue('D' . $row, $d->banyak);
            $sheet->setCellValue('E' . $row, $d->satuan_nama ?? '-');
            $sheet->setCellValue('F' . $row, $d->harga_satuan);
            $sheet->setCellValue('G' . $row, $d->jumlah);
            $row++;
        }

        // ================= TOTAL =================
        $total = $header->totalrealisasi ?? 0;

        $sheet->setCellValue('F' . $row, 'TOTAL');
        $sheet->setCellValue('G' . $row, $total);

        $sheet->getStyle('F' . $row . ':G' . $row)->applyFromArray($bold);
        $sheet->getStyle('F' . $row . ':G' . $row)->applyFromArray($center);

        $sheet->getStyle('F' . $row . ':G' . $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // ================= BORDER TABLE =================
        $sheet->getStyle('A7:G' . $row)
            ->applyFromArray($borderStyle);

        // ================= AUTO SIZE =================
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // ================= FORMAT ANGKA =================
        $sheet->getStyle('D8:G' . $row)
            ->getNumberFormat()
            ->setFormatCode('#,##0');

        // ================= CLEAN OUTPUT =================
        if (ob_get_length()) ob_end_clean();

        $filename = "Realisasi_{$noticket}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function export_excel_full($id)
    {
        require_once FCPATH . 'vendor/autoload.php';
        $this->load->model('M_monitoring');

        // ================= AMBIL HEADER DARI ID =================
        $header = $this->M_monitoring->getById($id);

        if (!$header) {
            show_error('Data tidak ditemukan', 404);
        }

        $noticket = $header->noticket;

        // ================= AMBIL DATA =================
        $rancangan = $this->M_monitoring->getRancanganExcel($noticket);
        $realisasi = $this->M_monitoring->getRealisasiExcel($noticket);

        // ================= INIT SPREADSHEET =================
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        // ================= SHEET 1 =================
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Rancangan');

        $this->buildSheet($sheet1, $header, $rancangan, 'RANCANGAN ANGGARAN BIAYA', 'total');

        // ================= SHEET 2 =================
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Realisasi');

        $this->buildSheet($sheet2, $header, $realisasi, 'REALISASI ANGGARAN BIAYA', 'totalrealisasi');

        // ================= SHEET 3 =================
        $sheet3 = $spreadsheet->createSheet();
        $sheet3->setTitle('Perbandingan');

        $this->buildComparisonSheet($sheet3, $header, $rancangan, $realisasi);

        // ================= OUTPUT =================
        if (ob_get_length()) ob_end_clean();

        $filename = "RAB_Full_{$noticket}.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    private function buildSheet($sheet, $header, $data, $title, $totalField)
    {
        $bold = ['font' => ['bold' => true]];
        $center = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        $border = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        // TITLE
        $sheet->setCellValue('A1', $title);
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->applyFromArray($bold)->applyFromArray($center)->getFont()->setSize(14);

        // HEADER INFO
        $sheet->setCellValue('A3', 'NOTICKET');
        $sheet->setCellValue('B3', ': ' . $header->noticket);
        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('A4', 'KEGIATAN');
        $sheet->setCellValue('B4', ': ' . $header->judul);
        $sheet->mergeCells('B4:D4');

        $sheet->setCellValue('A5', 'ORGANISASI');
        $sheet->setCellValue('B5', ': ' . $header->organisasi);
        $sheet->mergeCells('B5:D5');

        $sheet->getStyle('A3:A5')->applyFromArray($bold);

        // TABLE HEADER
        $sheet->fromArray([
            ['NO', 'Kategori', 'Nama Barang', 'Banyak', 'Satuan', 'Harga', 'Jumlah']
        ], NULL, 'A7');

        $sheet->getStyle('A7:G7')->applyFromArray($bold)->applyFromArray($center);

        // DATA
        $row = 8;
        $no = 1;

        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d->kategori_nama ?? '-');
            $sheet->setCellValue('C' . $row, $d->nama_barang);
            $sheet->setCellValue('D' . $row, $d->banyak);
            $sheet->setCellValue('E' . $row, $d->satuan_nama ?? '-');
            $sheet->setCellValue('F' . $row, $d->harga_satuan);
            $sheet->setCellValue('G' . $row, $d->jumlah);
            $row++;
        }

        // TOTAL
        $total = $header->$totalField ?? 0;

        $sheet->setCellValue('F' . $row, 'TOTAL');
        $sheet->setCellValue('G' . $row, $total);

        $sheet->getStyle('F' . $row . ':G' . $row)->applyFromArray($bold)->applyFromArray($center);

        // BORDER
        $sheet->getStyle('A7:G' . $row)->applyFromArray($border);

        // AUTO SIZE
        foreach (range('A', 'G') as $c) {
            $sheet->getColumnDimension($c)->setAutoSize(true);
        }

        // FORMAT
        $sheet->getStyle('D8:G' . $row)
            ->getNumberFormat()
            ->setFormatCode('#,##0');
    }

    private function buildComparisonSheet($sheet, $header, $rancangan, $realisasi)
    {
        $bold = ['font' => ['bold' => true]];

        $center = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        $border = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        // ================= TITLE =================
        $sheet->setCellValue('A1', 'PERBANDINGAN ANGGARAN (RANCANGAN vs REALISASI)');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->applyFromArray($bold)->applyFromArray($center)->getFont()->setSize(14);

        $sheet->getRowDimension(2)->setRowHeight(10);

        // ================= HEADER INFO =================
        $sheet->setCellValue('A3', 'NOTICKET');
        $sheet->setCellValue('B3', ': ' . $header->noticket);
        $sheet->mergeCells('B3:D3');

        $sheet->setCellValue('A4', 'KEGIATAN');
        $sheet->setCellValue('B4', ': ' . $header->judul);
        $sheet->mergeCells('B4:D4');

        $sheet->setCellValue('A5', 'ORGANISASI');
        $sheet->setCellValue('B5', ': ' . $header->organisasi);
        $sheet->mergeCells('B5:D5');

        $sheet->getStyle('A3:A5')->applyFromArray($bold);

        $sheet->getRowDimension(6)->setRowHeight(10);

        // ================= TABLE HEADER =================
        $sheet->fromArray([
            ['NO', 'Nama Barang', 'Rancangan', 'Realisasi', 'Selisih']
        ], NULL, 'A7');

        $sheet->getStyle('A7:E7')->applyFromArray($bold)->applyFromArray($center);

        // ================= MAP DATA =================
        $map = [];

        foreach ($rancangan as $r) {
            $map[$r->nama_barang] = [
                'nama' => $r->nama_barang,
                'rancangan' => $r->jumlah,
                'realisasi' => 0
            ];
        }

        foreach ($realisasi as $r) {
            if (!isset($map[$r->nama_barang])) {
                $map[$r->nama_barang] = [
                    'nama' => $r->nama_barang,
                    'rancangan' => 0,
                    'realisasi' => $r->jumlah
                ];
            } else {
                $map[$r->nama_barang]['realisasi'] = $r->jumlah;
            }
        }

        // ================= DATA ROW =================
        $row = 8;
        $no = 1;

        $totalRancangan = 0;
        $totalRealisasi = 0;

        foreach ($map as $m) {

            // $selisih = $m['realisasi'] - $m['rancangan'];    
            $selisih = $m['rancangan'] - $m['realisasi'];

            $totalRancangan += $m['rancangan'];
            $totalRealisasi += $m['realisasi'];

            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $m['nama']);
            $sheet->setCellValue('C' . $row, $m['rancangan']);
            $sheet->setCellValue('D' . $row, $m['realisasi']);
            $sheet->setCellValue('E' . $row, $selisih);

            $row++;
        }

        // ================= TOTAL ROW (DI DALAM TABEL) =================
        // $totalSelisih = $totalRealisasi - $totalRancangan;
        $totalSelisih = $totalRancangan - $totalRealisasi;

        $sheet->setCellValue('A' . $row, '');
        $sheet->setCellValue('B' . $row, 'TOTAL');
        $sheet->setCellValue('C' . $row, $totalRancangan);
        $sheet->setCellValue('D' . $row, $totalRealisasi);
        $sheet->setCellValue('E' . $row, $totalSelisih);

        $sheet->getStyle('A' . $row . ':E' . $row)->applyFromArray([
            'font' => ['bold' => true],
        ]);

        $sheet->getStyle('B' . $row . ':E' . $row)->applyFromArray($center);

        // ================= BORDER =================
        $sheet->getStyle('A7:E' . $row)->applyFromArray($border);

        // ================= AUTO SIZE =================
        foreach (range('A', 'E') as $c) {
            $sheet->getColumnDimension($c)->setAutoSize(true);
        }

        // ================= FORMAT RUPIAH =================
        $sheet->getStyle('C8:E' . $row)
            ->getNumberFormat()
            ->setFormatCode('"Rp" #,##0');
    }
}