<!DOCTYPE html>
<html>
<head>
    <title>Mater - SmartRAB</title>
    <style>
        /* hilangkan padding default swal */
        .swal2-popup {
            padding: 0 !important;
            border-radius: 16px !important;
            font-family: 'Inter', sans-serif;
        }

        /* hilangkan margin aneh */
        .swal2-html-container {
            margin: 0 !important;
            padding: 0 !important;
        }

        /* input style */
        .custom-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
        }

        .custom-input::placeholder {
            color: #9ca3af;
        }

        .custom-textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            height: 110px;
            font-size: 14px;
            resize: none;
            outline: none;
        }

        .btn-simpan {
            background: linear-gradient(to right, #5b8def, #4f7df3);
            color: white;
            padding: 10px 22px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <div class="flex-1">
        <?php $this->load->view('layout/head'); ?>

        <!-- CONTENT -->
        <div class="p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Master - Master Data</h2>
                <button class="bg-blue-500 text-white px-3 py-2 rounded-lg shadow flex items-center gap-2">
                    <?= file_get_contents(FCPATH . 'assets/icons/filter.svg'); ?> Pilih Filter
                </button>
            </div>

            <!-- Card List -->
        <div class="space-y-4">

            <!-- Item -->
            <div class="flex items-center justify-between bg-gray-50 border rounded-lg px-5 py-4 hover:bg-gray-100 transition">
                
                <!-- Left -->
                <div class="flex items-center gap-3 text-gray-700 font-medium">
                    <?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?>
                    <b>Master Kelas</b>
                </div>

                <!-- Right Button -->
                <button id="btnTambahKelas"
                    class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                    Tambah Data
                </button>
            </div>

            <!-- Item -->
            <div class="flex items-center justify-between bg-gray-50 border rounded-lg px-5 py-4 hover:bg-gray-100 transition">
                <div class="flex items-center gap-3 text-gray-700 font-medium">
                    <?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?>
                    <b>Master Organisasi</b>
                </div>

                <button id="btnTambahOrganisasi"
                    class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                    Tambah Data
                </button>
            </div>

            <!-- Item -->
            <div class="flex items-center justify-between bg-gray-50 border rounded-lg px-5 py-4 hover:bg-gray-100 transition">
                <div class="flex items-center gap-3 text-gray-700 font-medium">
                    <?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?>
                    <b>Master Kategori</b>
                </div>

                <button id="btnTambahKategori"
                    class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                    Tambah Data
                </button>
            </div>

            <!-- Item -->
            <div class="flex items-center justify-between bg-gray-50 border rounded-lg px-5 py-4 hover:bg-gray-100 transition">
                <div class="flex items-center gap-3 text-gray-700 font-medium">
                    <?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?>
                    <b>Master Satuan</b>
                </div>

                <button id="btnTambahSatuan"
                    class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                    Tambah Data
                </button>
            </div>

        </div>
    </div>
</body>

<script>
document.getElementById('btnTambahKelas').addEventListener('click', function () {
    Swal.fire({
        showConfirmButton: false,
        width: '520px',
        html: `
        <div style="text-align:left;">

            <!-- HEADER -->
            <div style="display:flex; justify-content:space-between; align-items:center; padding:22px 24px 16px 24px;">
                <h2 style="font-size:20px; font-weight:600; color:#111827;">Tambah Kelas</h2>
                <button id="closeSwal" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- KELAS -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Kelas</label>
                <input id="kelas" class="custom-input" placeholder="Masukkan kelas">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="deskripsi" class="custom-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanData" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
        didOpen: () => {
            document.getElementById('closeSwal').onclick = () => Swal.close();

            document.getElementById('simpanData').onclick = () => {
                const kelas = document.getElementById('kelas').value;

                if (!kelas) {
                    Swal.showValidationMessage('Kelas wajib diisi!');
                    return;
                }

                Swal.fire('Berhasil!', 'Data disimpan', 'success');
            };
        }
    });
});

document.getElementById('btnTambahOrganisasi').addEventListener('click', function () {
    Swal.fire({
        showConfirmButton: false,
        width: '520px',
        html: `
        <div style="text-align:left;">

            <!-- HEADER -->
            <div style="display:flex; justify-content:space-between; align-items:center; padding:22px 24px 16px 24px;">
                <h2 style="font-size:20px; font-weight:600; color:#111827;">Tambah Organisasi</h2>
                <button id="closeSwal" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- ORGANISASI -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Organisasi</label>
                <input id="kelas" class="custom-input" placeholder="Masukkan organisasi">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="deskripsi" class="custom-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanData" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
        didOpen: () => {
            document.getElementById('closeSwal').onclick = () => Swal.close();

            document.getElementById('simpanData').onclick = () => {
                const kelas = document.getElementById('kelas').value;

                if (!kelas) {
                    Swal.showValidationMessage('Kelas wajib diisi!');
                    return;
                }

                Swal.fire('Berhasil!', 'Data disimpan', 'success');
            };
        }
    });
});

document.getElementById('btnTambahKategori').addEventListener('click', function () {
    Swal.fire({
        showConfirmButton: false,
        width: '520px',
        html: `
        <div style="text-align:left;">

            <!-- HEADER -->
            <div style="display:flex; justify-content:space-between; align-items:center; padding:22px 24px 16px 24px;">
                <h2 style="font-size:20px; font-weight:600; color:#111827;">Tambah Kategori</h2>
                <button id="closeSwal" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- KATEGORI -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Kategori</label>
                <input id="kelas" class="custom-input" placeholder="Masukkan kategori">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="deskripsi" class="custom-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanData" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
        didOpen: () => {
            document.getElementById('closeSwal').onclick = () => Swal.close();

            document.getElementById('simpanData').onclick = () => {
                const kelas = document.getElementById('kelas').value;

                if (!kelas) {
                    Swal.showValidationMessage('Kelas wajib diisi!');
                    return;
                }

                Swal.fire('Berhasil!', 'Data disimpan', 'success');
            };
        }
    });
});

document.getElementById('btnTambahSatuan').addEventListener('click', function () {
    Swal.fire({
        showConfirmButton: false,
        width: '520px',
        html: `
        <div style="text-align:left;">

            <!-- HEADER -->
            <div style="display:flex; justify-content:space-between; align-items:center; padding:22px 24px 16px 24px;">
                <h2 style="font-size:20px; font-weight:600; color:#111827;">Tambah Satuan</h2>
                <button id="closeSwal" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- SATUAN -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Satuan</label>
                <input id="kelas" class="custom-input" placeholder="Masukkan satuan">

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanData" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
        didOpen: () => {
            document.getElementById('closeSwal').onclick = () => Swal.close();

            document.getElementById('simpanData').onclick = () => {
                const kelas = document.getElementById('kelas').value;

                if (!kelas) {
                    Swal.showValidationMessage('Kelas wajib diisi!');
                    return;
                }

                Swal.fire('Berhasil!', 'Data disimpan', 'success');
            };
        }
    });
});
</script>
</html>