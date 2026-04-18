<!DOCTYPE html>
<html>

<head>
    <title>Mater - SmartRAB</title>
    <style>
        /* input style */

        .form-input {
            font-size: 14px;
            margin-top: 4px;
            padding: .5rem;
            width: 100%;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            outline: none;
        }

        .form-input:focus {
            box-shadow: 0 0 0 1px #bfdbfe;
        }

        /* khusus textarea */
        .form-textarea {
            height: 110px;
            resize: none;
        }

        .btn-simpan {
            background: linear-gradient(to right, #5b8def, #4f7df3);
            color: white;
            padding: 10px 22px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
        }
    </style>
</head>

<body style="background-color: #F2F6FF;" class="flex min-h-screen">

    <div class="flex-1 ml-64">
        <?php $this->load->view('layout/head'); ?>

        <!-- CONTENT -->
        <div class="p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Master - Master Data</h2>
            </div>

            <div class="space-y-4">

                <!-- Master Kelas -->
                <div class="border rounded-lg overflow-hidden shadow-sm">
                    <!-- Header -->
                    <div id="kelasHeader" onclick="toggleSection('kelasContent','arrowKelas', this)"
                        class="flex items-center justify-between px-5 py-4 bg-gray-50 cursor-pointer transition">
                        <div class="flex items-center gap-3 text-gray-700 font-medium">
                            <span id="arrowKelas"
                                class="transition-transform"><?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?></span>
                            <b>Master Kelas</b>
                        </div>
                        <button id="btnTambahKelas" onclick="event.stopPropagation();"
                            class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                            Tambah Data
                        </button>
                    </div>

                    <!-- Content (Tabel) -->
                    <div id="kelasContent" class="hidden bg-white">
                        <table class="min-w-full text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left">NO</th>
                                    <th class="px-6 py-3 text-left">Kelas</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-center w-40">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php $no = 1;
                                foreach ($kelas as $k) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3"><?= $no++ ?></td>
                                        <td class="px-6 py-3"><?= $k->name ?></td>
                                        <td class="px-6 py-3"><?= $k->description ?></td>
                                        <td class="px-6 py-3 text-center space-x-2 whitespace-nowrap">
                                            <button
                                                onclick="event.stopPropagation(); hapusData('mskelas','<?= $k->code ?>')"
                                                class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Master Organisasi -->
                <div class="border rounded-lg overflow-hidden shadow-sm">
                    <div id="orgHeader" onclick="toggleSection('orgContent','arrowOrg', this)"
                        class="flex items-center justify-between px-5 py-4 bg-gray-50 cursor-pointer transition">
                        <div class="flex items-center gap-3 text-gray-700 font-medium">
                            <span id="arrowOrg"
                                class="transition-transform"><?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?></span>
                            <b>Master Organisasi</b>
                        </div>
                        <button id="btnTambahOrganisasi"
                            class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                            Tambah Data
                        </button>
                    </div>

                    <div id="orgContent" class="hidden bg-white">
                        <table class="min-w-full text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left">NO</th>
                                    <th class="px-6 py-3 text-left">Organisasi</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-center w-40">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php $no = 1;
                                foreach ($organisasi as $o) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3"><?= $no++ ?></td>
                                        <td class="px-6 py-3"><?= $o->name ?></td>
                                        <td class="px-6 py-3"><?= $o->description ?></td>
                                        <td class="px-6 py-3 text-center">
                                            <button
                                                onclick="event.stopPropagation(); hapusData('msorganisasi','<?= $o->code ?>')"
                                                class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg">
                                                <?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Master Kategori -->
                <div class="border rounded-lg overflow-hidden shadow-sm">
                    <div id="kategoriHeader" onclick="toggleSection('kategoriContent','arrowKategori', this)"
                        class="flex items-center justify-between px-5 py-4 bg-gray-50 cursor-pointer transition">
                        <div class="flex items-center gap-3 text-gray-700 font-medium">
                            <span id="arrowKategori"
                                class="transition-transform"><?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?></span>
                            <b>Master Kategori</b>
                        </div>
                        <button id="btnTambahKategori"
                            class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                            Tambah Data
                        </button>
                    </div>

                    <div id="kategoriContent" class="hidden bg-white">
                        <table class="min-w-full text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left">NO</th>
                                    <th class="px-6 py-3 text-left">Kategori</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-center w-40">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php $no = 1;
                                foreach ($kategori as $k) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3"><?= $no++ ?></td>
                                        <td class="px-6 py-3"><?= $k->name ?></td>
                                        <td class="px-6 py-3"><?= $k->description ?></td>
                                        <td class="px-6 py-3 text-center">
                                            <button
                                                onclick="event.stopPropagation(); hapusData('mskategori','<?= $k->code ?>')"
                                                class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg">
                                                <?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Master Satuan -->
                <div class="border rounded-lg overflow-hidden shadow-sm">
                    <div id="satuanHeader" onclick="toggleSection('satuanContent','arrowSatuan', this)"
                        class="flex items-center justify-between px-5 py-4 bg-gray-50 cursor-pointer transition">
                        <div class="flex items-center gap-3 text-gray-700 font-medium">
                            <span id="arrowSatuan"
                                class="transition-transform"><?= file_get_contents(FCPATH . 'assets/icons/chevron-right.svg'); ?></span>
                            <b>Master Satuan</b>
                        </div>
                        <button id="btnTambahSatuan"
                            class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                            Tambah Data
                        </button>
                    </div>

                    <div id="satuanContent" class="hidden bg-white">
                        <table class="min-w-full text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left">NO</th>
                                    <th class="px-6 py-3 text-left">Satuan</th>
                                    <th class="px-6 py-3 text-center w-40">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php $no = 1;
                                foreach ($satuan as $s) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3"><?= $no++ ?></td>
                                        <td class="px-6 py-3"><?= $s->name ?></td>
                                        <td class="px-6 py-3 text-center">
                                            <button
                                                onclick="event.stopPropagation(); hapusData('mssatuan','<?= $s->code ?>')"
                                                class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg">
                                                <?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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
                <input id="kelasInput" class="form-input" placeholder="Masukkan kelas">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="deskripsiInput" class="form-input form-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="btnSimpanKelas" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
            didOpen: () => {
                document.getElementById('closeSwal').onclick = (e) => {
                    e.stopPropagation();
                    Swal.close();
                };

                document.getElementById("btnSimpanKelas").addEventListener("click", function (e) {
                    e.stopPropagation();

                    let nama = document.getElementById("kelasInput").value;
                    let deskripsi = document.getElementById("deskripsiInput").value;

                    if (!nama) {
                        Swal.showValidationMessage("Kelas wajib diisi!");
                        return;
                    }

                    let formData = new FormData();
                    formData.append("nama", nama);
                    formData.append("deskripsi", deskripsi);

                    fetch("<?= base_url('C_master/simpanKelas') ?>", {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.text())
                        .then(res => {
                            if (res == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data kelas berhasil disimpan"
                                }).then(() => location.reload());
                            } else {
                                Swal.fire({ icon: "error", title: "Gagal", text: res });
                            }
                        })
                        .catch(() => Swal.fire("Error", "Server bermasalah", "error"));
                });
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
                <button id="closeSwalorg" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- ORGANISASI -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Organisasi</label>
                <input id="orginput" class="form-input" placeholder="Masukkan organisasi">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="deskorg" class="form-input form-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanDataOrg" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
            didOpen: () => {

                document.getElementById('closeSwalorg').onclick = () => Swal.close();

                document.getElementById("simpanDataOrg").addEventListener("click", function () {

                    let organisasi = document.getElementById("orginput").value;
                    let deskripsi = document.getElementById("deskorg").value;

                    if (!organisasi) {
                        Swal.showValidationMessage("Organisasi wajib diisi!");
                        return;
                    }

                    let formData = new FormData();
                    formData.append("nama", organisasi);
                    formData.append("deskripsi", deskripsi);

                    fetch("<?= base_url('C_master/simpanOrganisasi') ?>", {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.text())
                        .then(res => {

                            if (res == "success") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data organisasi berhasil disimpan"
                                }).then(() => {
                                    location.reload();
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: res
                                });

                            }

                        })
                        .catch(() => {
                            Swal.fire("Error", "Server bermasalah", "error");
                        });

                });

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
                <button id="closeSwalKtgr" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- KATEGORI -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Kategori</label>
                <input id="KtgrInput" class="form-input" placeholder="Masukkan kategori">

                <!-- DESKRIPSI -->
                <label style="font-size:14px; color:#374151; margin:18px 0 6px; display:block;">Deskripsi</label>
                <textarea id="DesKtgr" class="form-input form-textarea" placeholder="Masukkan deskripsi"></textarea>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanDataKtgr" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
            didOpen: () => {

                document.getElementById('closeSwalKtgr').onclick = () => Swal.close();

                document.getElementById("simpanDataKtgr").addEventListener("click", function () {

                    let kategori = document.getElementById("KtgrInput").value;
                    let deskripsi = document.getElementById("DesKtgr").value;


                    if (!kategori) {
                        Swal.showValidationMessage("Kategori wajib diisi!");
                        return;
                    }

                    if (!deskripsi) {
                        Swal.showValidationMessage("Deskripsi wajib diisi!");
                        return;
                    }

                    let formData = new FormData();
                    formData.append("nama", kategori);
                    formData.append("deskripsi", deskripsi);

                    fetch("<?= base_url('C_master/simpanKategori') ?>", {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.text())
                        .then(res => {

                            if (res == "success") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data kategori berhasil disimpan"
                                }).then(() => {
                                    location.reload();
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: res
                                });

                            }

                        })
                        .catch(() => {
                            Swal.fire("Error", "Server bermasalah", "error");
                        });

                });

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
                <button id="closeSwalSatuan" style="font-size:22px; color:#6b7280;">×</button>
            </div>

            <div style="border-top:1px solid #e5e7eb;"></div>

            <!-- BODY -->
            <div style="padding:20px 24px 24px 24px;">

                <!-- SATUAN -->
                <label style="font-size:14px; color:#374151; margin-bottom:6px; display:block;">Satuan</label>
                <input id="satuan" class="form-input" placeholder="Masukkan satuan">

                <!-- BUTTON -->
                <div style="display:flex; justify-content:flex-end; margin-top:22px;">
                    <button id="simpanDataSatuan" class="btn-simpan">Simpan</button>
                </div>

            </div>
        </div>
        `,
            didOpen: () => {

                document.getElementById('closeSwalSatuan').onclick = () => Swal.close();

                document.getElementById("simpanDataSatuan").addEventListener("click", function () {

                    let satuan = document.getElementById("satuan").value;

                    if (!satuan) {
                        Swal.showValidationMessage("Satuan wajib diisi!");
                        return;
                    }

                    let formData = new FormData();
                    formData.append("nama", satuan);

                    fetch("<?= base_url('C_master/simpanSatuan') ?>", {
                        method: "POST",
                        body: formData,
                    })
                        .then(res => res.text())
                        .then(res => {

                            if (res == "success") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data satuan berhasil disimpan"
                                }).then(() => {
                                    location.reload();
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: res
                                });

                            }

                        })
                        .catch(() => {
                            Swal.fire("Error", "Server bermasalah", "error");
                        });

                });

            }
        });
    });

    function toggleSection(contentId, arrowId, header) {
        const content = document.getElementById(contentId);
        const arrow = document.getElementById(arrowId);

        content.classList.toggle('hidden');

        if (!content.classList.contains('hidden')) {
            header.classList.add('bg-gray-100');
            arrow.style.transform = 'rotate(90deg)'; // arrow down
        } else {
            header.classList.remove('bg-gray-100');
            arrow.style.transform = 'rotate(0deg)'; // arrow right
        }
    }


    function hapusData(table, id) {

        Swal.fire({
            title: "Yakin hapus data?",
            text: "Data tidak bisa dikembalikan!",
            imageUrl: "<?= base_url('assets/icons/trash2.svg') ?>",
            imageWidth: 60,
            imageHeight: 60,

            showCancelButton: true,
            confirmButtonColor: "#ef4444",
            cancelButtonColor: "#cccccc",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {

            if (result.isConfirmed) {

                let formData = new FormData();
                formData.append("table", table);
                formData.append("id", id);

                fetch("<?= base_url('C_Master/deleteData') ?>", {
                    method: "POST",
                    body: formData
                })
                    .then(res => res.text())
                    .then(res => {

                        if (res === "success") {
                            Swal.fire("Berhasil", "Data berhasil dihapus", "success")
                                .then(() => location.reload());
                        } else {
                            Swal.fire("Gagal", res, "error");
                        }

                    })
                    .catch(() => {
                        Swal.fire("Error", "Server bermasalah", "error");
                    });

            }
        });
    }

</script>

</html>