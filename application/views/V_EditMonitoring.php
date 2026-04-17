<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Monitoring - Daftar Anggaran - Detail</title>
</head>

<body class="bg-gray-100 flex min-h-screen">

    <div class="flex-1 ml-64">
        <!-- HEADER BAR -->
        <?php $this->load->view('layout/head'); ?>

        <div class="p-8">
            <!-- Title -->
            <h1 class="text-2xl font-semibold mb-6">Monitoring - Daftar Anggaran - Detail</h1>

            <!-- Detail Header -->
            <div class="bg-white rounded-lg shadow-sm border p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Detail Header</h2>

                <div class="grid grid-cols-3 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Tiket</label>
                        <input disabled type="text"
                            value="<?= $header->noticket ?>"
                            class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300">
                    </div>
                    <input type="hidden" id="noticket" value="<?= $header->noticket ?>">

                    <div>
                        <label class="text-sm text-gray-600">Judul</label>
                        <input type="text" name="judul" id="judul"
                            placeholder="Masukkan Judul Laporan"
                            class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $header->judul ?>">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Organisasi</label>
                        <select class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="organisasi" id="organisasi">
                            <?php foreach ($organisasi as $org): ?>
                                <option value="<?= $org->code ?>"
                                    <?= $org->code == $header->organisasi ? 'selected' : '' ?>>
                                    <?= $org->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>

            <!-- ALERT BOX -->
            <div class="flex items-center justify-between bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6  <?= !empty($detail_realisasi) ? 'hidden' : '' ?>">
                <!-- LEFT -->
                <div class="flex items-start gap-3">
                    <!-- ICON -->
                    <div class="bg-yellow-100 text-yellow-600 p-2 rounded-md">
                        <?= file_get_contents(FCPATH . 'assets/icons/warning.svg'); ?>
                    </div>

                    <!-- TEXT -->
                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Tambah Data untuk Realisasi
                        </h3>
                        <p class="text-sm text-gray-500">
                            Apabila Anda ingin menambah tabel untuk data realisasi anggaran belanja,
                            silakan klik tombol Tambah Data Realisasi untuk melanjutkan
                        </p>
                    </div>
                </div>

                <!-- RIGHT BUTTON -->
                <button class="btnTambahRealiasasi bg-blue-600 text-white rounded-md px-4 py-2 <?= !empty($detail_realisasi) ? 'hidden' : '' ?>">
                    Tambah Data Realisasi
                </button>

            </div>

            <!-- Detail Table -->
            <div class="card-rancangan bg-white rounded-lg shadow-sm border p-6 mb-4">

                <h2 class="text-lg font-semibold mb-4">Detail Item - Rancangan</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50">
                            <tr class="text-gray-600">
                                <th class="p-3 text-left">NO</th>
                                <th class="p-3 text-left">Kategori</th>
                                <th class="p-3 text-left">Nama Barang</th>
                                <th class="p-3 text-left">Banyak</th>
                                <th class="p-3 text-left">Satuan</th>
                                <th class="p-3 text-left">Harga Satuan</th>
                                <th class="p-3 text-left">Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            <?php if (!empty($detail_rancangan)): ?>
                                <?php $no = 1;
                                foreach ($detail_rancangan as $d): ?>

                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">1</td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="kategori_rancangan[]">
                                                <option value="">Pilih Kategori</option>

                                                <?php foreach ($kategori as $k): ?>
                                                    <option value="<?= $k->code ?>"
                                                        <?= $k->code == $d->kategori ? 'selected' : '' ?>>
                                                        <?= $k->name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="nama_barang_rancangan[]"
                                                placeholder=" Masukkan nama barang"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->nama_barang ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="banyak_rancangan[]"
                                                placeholder="Masukkan banyak"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->banyak ?>">
                                        </td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="satuan_rancangan[]">
                                                <option value="">Pilih Satuan</option>
                                                <?php foreach ($satuan as $s): ?>
                                                    <option value="<?= $s->code ?>"
                                                        <?= $s->code == $d->satuan ? 'selected' : '' ?>>
                                                        <?= $s->name ?>
                                                    </option>
                                                <?php endforeach; ?>


                                            </select>
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="harga_satuan_rancangan[]"
                                                placeholder="Masukkan harga satuan"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->harga_satuan ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="jumlah_rancangan[]"
                                                disabled
                                                class="w-full p-2 rounded-md border border-gray-300 bg-gray-100" value="Rp <?= number_format($d->jumlah, 0, ',', '.') ?>">
                                        </td>

                                        <td class="p-2">
                                            <button class="btnHapus bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <!-- Add Row -->
                <button class="mt-4 text-blue-600 text-sm font-medium btnTambahBaris">
                    + Tambah Baris Baru
                </button>

                <!-- Total -->
                <div class="flex items-center justify-between mt-6 p-4 bg-gray-100 rounded-lg border border-gray-200">

                    <span class="text-sm font-medium text-gray-600">Total</span>

                    <span class="text-blue-600 font-semibold totalRancangan">
                        Rp <?= number_format($header->total, 0, ',', '.') ?>
                    </span>

                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 mt-6">

                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-green-100 text-green-600 border border-green-400 rounded-lg hover:bg-green-200 transition">

                        <!-- ICON -->
                        <?= file_get_contents(FCPATH . 'assets/icons/download.svg'); ?>

                        <!-- TEXT -->
                        <span class="font-medium">
                            Export to Excel
                        </span>

                    </button>

                </div>

            </div>

            <!-- Detail Table Realisasi-->
            <div class="card-realisasi bg-white rounded-lg shadow-sm border p-6 mb-4 <?= empty($detail_realisasi) ? 'hidden' : '' ?>">

                <h2 class="text-lg font-semibold mb-4">Detail Item - Realisasi</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50">
                            <tr class="text-gray-600">
                                <th class="p-3 text-left">NO</th>
                                <th class="p-3 text-left">Kategori</th>
                                <th class="p-3 text-left">Nama Barang</th>
                                <th class="p-3 text-left">Banyak</th>
                                <th class="p-3 text-left">Satuan</th>
                                <th class="p-3 text-left">Harga Satuan</th>
                                <th class="p-3 text-left">Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            <?php if (!empty($detail_realisasi)): ?>
                                <?php $no = 1;
                                foreach ($detail_realisasi as $d): ?>

                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">1</td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="kategori_realisasi[]">
                                                <option value="">Pilih Kategori</option>

                                                <?php foreach ($kategori as $k): ?>
                                                    <option value="<?= $k->code ?>"
                                                        <?= $k->code == $d->kategori ? 'selected' : '' ?>>
                                                        <?= $k->name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="nama_barang_realisasi[]"
                                                placeholder="Masukkan nama barang"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->nama_barang ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="banyak_realisasi[]"
                                                placeholder="Masukkan banyak"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->banyak ?>">
                                        </td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="satuan_realisasi[]">
                                                <option value="">Pilih Satuan</option>
                                                <?php foreach ($satuan as $s): ?>
                                                    <option value="<?= $s->code ?>"
                                                        <?= $s->code == $d->satuan ? 'selected' : '' ?>>
                                                        <?= $s->name ?>
                                                    </option>
                                                <?php endforeach; ?>


                                            </select>
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="harga_satuan_realisasi[]"
                                                placeholder="Masukkan harga satuan"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->harga_satuan ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="jumlah_realisasi[]"
                                                disabled
                                                class="w-full p-2 rounded-md border border-gray-300 bg-gray-100" value="Rp <?= number_format($d->jumlah, 0, ',', '.') ?>">
                                        </td>

                                        <td class="p-2">
                                            <button class="btnHapus bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <!-- Add Row -->
                <button class="mt-4 text-blue-600 text-sm font-medium btnTambahBaris">
                    + Tambah Baris Baru
                </button>

                <!-- Total -->
                <div class="flex items-center justify-between mt-6 p-4 bg-gray-100 rounded-lg border border-gray-200">

                    <span class="text-sm font-medium text-gray-600">Total</span>

                    <span class="text-blue-600 font-semibold totalRealisasi">
                        Rp <?= number_format($header->totalrealisasi, 0, ',', '.') ?>
                    </span>

                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 mt-6">

                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-green-100 text-green-600 border border-green-400 rounded-lg hover:bg-green-200 transition">

                        <!-- ICON -->
                        <?= file_get_contents(FCPATH . 'assets/icons/download.svg'); ?>

                        <!-- TEXT -->
                        <span class="font-medium">
                            Export to Excel
                        </span>

                    </button>

                </div>

            </div>

            <div class="border border-gray-200 rounded-lg overflow-hidden">

                <div class="card-selisih bg-gray-100 px-4 py-3 flex items-center justify-between hidden">
                    <span class="text-sm font-medium text-gray-600">
                        Selisih
                    </span>

                    <?php
                    $selisih = $header->selisih;
                    $isMinus = $selisih < 0;
                    ?>

                    <span id="selisih"
                        class="text-sm font-semibold <?= $isMinus ? 'text-red-600' : 'text-blue-600' ?>">

                        <?= $isMinus ? '- Rp ' . number_format(abs($selisih), 0, ',', '.')
                            : 'Rp ' . number_format($selisih, 0, ',', '.') ?>
                    </span>
                </div>

                <div class="bg-white px-4 py-3 flex justify-end gap-2">

                    <button id="btnBatal"
                        class="px-4 py-2 text-sm text-blue-600 bg-blue-100 border border-blue-300 rounded-md">
                        Batal
                    </button>

                    <button id="btnSimpan"
                        class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md">
                        Simpan
                    </button>

                </div>

            </div>
        </div>


    </div>

</body>

</html>

<script>
    let initialState = "";

    window.addEventListener("load", function() {
        initialState = document.querySelector(".p-8").innerHTML;
    });

    let isEditRealisasi = document.querySelectorAll("[name='kategori_realisasi[]']").length > 0;

    const btn = document.querySelector('.btnTambahRealiasasi');
    const cardRealisasi = document.querySelector('.card-realisasi');
    const cardSelisih = document.querySelector('.card-selisih');

    btn.addEventListener('click', function() {
        cardRealisasi.classList.remove('hidden');
        cardSelisih.classList.remove('hidden');

        btn.classList.remove('bg-blue-600');
        btn.classList.add('bg-gray-400');

        copyRancanganToRealisasi();
        disableAnggaran();
    });

    document.querySelectorAll(".btnTambahBaris").forEach(btn => {
        btn.addEventListener("click", function() {

            let card = this.closest(".bg-white");
            let tbody = card.querySelector("tbody");

            let rowCount = tbody.querySelectorAll("tr").length + 1;

            let firstRow = tbody.querySelector("tr");
            let newRow = firstRow.cloneNode(true);

            // reset isi input
            newRow.querySelectorAll("input").forEach(input => input.value = "");
            newRow.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

            // update nomor
            newRow.children[0].innerText = rowCount;

            tbody.appendChild(newRow);
        });
    });

    document.querySelectorAll("tbody").forEach(tbody => {
        tbody.addEventListener("click", function(e) {

            let btn = e.target.closest(".btnHapus");

            if (btn) {
                let row = btn.closest("tr");
                row.remove();

                // update nomor
                let rows = tbody.querySelectorAll("tr");
                rows.forEach((tr, index) => {
                    tr.children[0].innerText = index + 1;
                });

                hitungTotal(tbody);
            }
        });
    });

    document.querySelectorAll("tbody").forEach(tbody => {

        tbody.addEventListener("input", function(e) {

            let row = e.target.closest("tr");
            if (!row) return;

            let banyak = row.querySelector("[name*='banyak_']").value;
            let harga = row.querySelector("[name*='harga_satuan_']").value;
            let jumlahInput = row.querySelector("[name*='jumlah_']");

            let hasil = (parseFloat(banyak) || 0) * (parseFloat(harga) || 0);

            jumlahInput.value = hasil ?
                "Rp " + hasil.toLocaleString("id-ID") :
                "";

            hitungTotal(tbody);
        });

    });

    function hitungTotal(tbody) {

        let jumlahInputs = tbody.querySelectorAll("[name*='jumlah_']");
        let total = 0;

        jumlahInputs.forEach(input => {
            let value = input.value.replace(/[^0-9]/g, "");
            total += parseFloat(value) || 0;
        });

        let card = tbody.closest(".bg-white");

        let totalEl =
            card.querySelector(".totalRancangan") ||
            card.querySelector(".totalRealisasi");

        if (totalEl) {
            totalEl.innerText = "Rp " + total.toLocaleString("id-ID");
        }

        hitungSelisih();
    }

    document.getElementById("btnSimpan").addEventListener("click", function(e) {

        e.preventDefault();

        Swal.fire({
            title: "Simpan Data?",
            text: "Pastikan data sudah benar",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan",
            cancelButtonText: "Batal"
        }).then((result) => {

            if (!result.isConfirmed) return;

            let judul = document.getElementById("judul").value;
            let organisasi = document.getElementById("organisasi").value;
            let noticket = document.getElementById("noticket").value;

            // 🔥 FIX TOTAL
            let total = document.querySelector(".totalRancangan")
                ?.innerText.replace(/[^0-9]/g, "") || 0;
            let totalRealisasi = document.querySelector(".totalRealisasi")
                ?.innerText.replace(/[^0-9]/g, "") || 0;

            // ================= RANCANGAN =================
            let kategori_r = document.querySelectorAll("[name='kategori_rancangan[]']");
            let nama_barang_r = document.querySelectorAll("[name='nama_barang_rancangan[]']");
            let banyak_r = document.querySelectorAll("[name='banyak_rancangan[]']");
            let satuan_r = document.querySelectorAll("[name='satuan_rancangan[]']");
            let harga_r = document.querySelectorAll("[name='harga_satuan_rancangan[]']");
            let jumlah_r = document.querySelectorAll("[name='jumlah_rancangan[]']");

            // ================= REALISASI =================
            let kategori_re = document.querySelectorAll("[name='kategori_realisasi[]']");
            let nama_barang_re = document.querySelectorAll("[name='nama_barang_realisasi[]']");
            let banyak_re = document.querySelectorAll("[name='banyak_realisasi[]']");
            let satuan_re = document.querySelectorAll("[name='satuan_realisasi[]']");
            let harga_re = document.querySelectorAll("[name='harga_satuan_realisasi[]']");
            let jumlah_re = document.querySelectorAll("[name='jumlah_realisasi[]']");

            // 🔥 FIX TOTAL AMAN
            let totalR = document.querySelector(".totalRancangan")
                ?.innerText.replace(/[^0-9]/g, "") || 0;

            let totalRe = document.querySelector(".totalRealisasi")
                ?.innerText.replace(/[^0-9]/g, "") || 0;

            let selisih = (parseFloat(totalR) || 0) - (parseFloat(totalRe) || 0);

            if (kategori_r.length === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Peringatan",
                    text: "Minimal harus ada 1 baris data"
                });
                return;
            }

            for (let i = 0; i < kategori_r.length; i++) {
                if (
                    !kategori_r[i].value ||
                    !nama_barang_r[i].value ||
                    !banyak_r[i].value ||
                    !satuan_r[i].value ||
                    !harga_r[i].value
                ) {
                    Swal.fire({
                        icon: "warning",
                        title: "Peringatan",
                        text: "Semua field wajib diisi"
                    });
                    return;
                }
            }

            let formData = new FormData();

            formData.append("noticket", noticket);
            formData.append("judul", judul);
            formData.append("organisasi", organisasi);
            formData.append("total", total);
            formData.append("totalrealisasi", totalRealisasi);
            formData.append("selisih", selisih);

            for (let i = 0; i < kategori_r.length; i++) {
                formData.append("kategori_rancangan[]", kategori_r[i].value);
                formData.append("nama_barang_rancangan[]", nama_barang_r[i].value);
                formData.append("banyak_rancangan[]", banyak_r[i].value);
                formData.append("satuan_rancangan[]", satuan_r[i].value);
                formData.append("harga_satuan_rancangan[]", harga_r[i].value);
                formData.append("jumlah_rancangan[]", jumlah_r[i].value);
            }

            for (let i = 0; i < kategori_re.length; i++) {
                formData.append("kategori_realisasi[]", kategori_re[i].value);
                formData.append("nama_barang_realisasi[]", nama_barang_re[i].value);
                formData.append("banyak_realisasi[]", banyak_re[i].value);
                formData.append("satuan_realisasi[]", satuan_re[i].value);
                formData.append("harga_satuan_realisasi[]", harga_re[i].value);
                formData.append("jumlah_realisasi[]", jumlah_re[i].value);
            }

            let url = isEditRealisasi ?
                "<?= base_url('C_monitoring/update_realisasi') ?>" :
                "<?= base_url('C_monitoring/simpan') ?>";

            fetch(url, {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(res => {
                    if (res == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Data berhasil disimpan"
                        }).then(() => location.reload());
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: res
                        });
                    }
                });

        }); // ✅ ini nutup Swal
    }); // ✅ ini nutup addEventListener

    document.getElementById("btnBatal").addEventListener("click", function() {

        Swal.fire({
            title: "Batalkan perubahan?",
            text: "Semua perubahan akan dikembalikan seperti semula",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {

            if (result.isConfirmed) {

                // 🔥 restore ke kondisi awal
                document.querySelector(".p-8").innerHTML = initialState;

                // 🔥 reload script biar event aktif lagi
                location.reload();
            }
        });
    });

    function hitungSelisih() {

        let totalRancangan = document.querySelector(".totalRancangan")
            ?.innerText.replace(/[^0-9]/g, "") || 0;

        let totalRealisasi = document.querySelector(".totalRealisasi")
            ?.innerText.replace(/[^0-9]/g, "") || 0;

        let selisih = (parseFloat(totalRancangan) || 0) - (parseFloat(totalRealisasi) || 0);

        let elSelisih = document.getElementById("selisih");

        elSelisih.innerText = "Rp " + selisih.toLocaleString("id-ID");

        if (selisih > 0) {
            elSelisih.classList.remove("text-red-600");
            elSelisih.classList.add("text-blue-600");
        } else if (selisih < 0) {
            elSelisih.classList.remove("text-blue-600");
            elSelisih.classList.add("text-red-600");
        } else {
            elSelisih.classList.remove("text-red-600");
            elSelisih.classList.add("text-blue-600");
        }
    }

    function disableAnggaran() {

        let cardRancangan = document.querySelector(".card-rancangan");

        if (!cardRancangan) return;

        // disable input & select
        let inputs = cardRancangan.querySelectorAll("input, select");

        inputs.forEach(el => {
            el.disabled = true;
            el.classList.add("bg-gray-100", "cursor-not-allowed");
        });

        // disable tombol hapus
        cardRancangan.querySelectorAll(".btnHapus").forEach(btn => {
            btn.disabled = true;
            btn.classList.add("opacity-50", "cursor-not-allowed");
        });

        // disable tombol tambah baris
        let btnTambah = cardRancangan.querySelector(".btnTambahBaris");
        if (btnTambah) {
            btnTambah.disabled = true;
            btnTambah.classList.add("opacity-50", "cursor-not-allowed");
        }
    }

    function copyRancanganToRealisasi() {

        let tbodyRancangan = document.querySelector(".card-rancangan tbody");
        let tbodyRealisasi = document.querySelector(".card-realisasi tbody");

        tbodyRealisasi.innerHTML = "";

        let rows = tbodyRancangan.querySelectorAll("tr");

        rows.forEach((tr, index) => {

            let newRow = tr.cloneNode(true);

            // 🔥 FIX NAME
            newRow.querySelectorAll("[name]").forEach(el => {
                if (el.name.includes("rancangan")) {
                    el.name = el.name.replace("rancangan", "realisasi");
                }
            });

            newRow.children[0].innerText = index + 1;

            tbodyRealisasi.appendChild(newRow);
        });

        hitungTotal(tbodyRealisasi);
    }

    window.addEventListener("load", function() {
        let adaRealisasi = document.querySelector(".card-realisasi:not(.hidden)");

        if (adaRealisasi) {
            disableAnggaran();
            document.querySelector('.card-selisih').classList.remove('hidden');
        }
    });
</script>