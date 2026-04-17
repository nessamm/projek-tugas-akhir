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
            <div class="flex items-center justify-between bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">

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
                <button class="btnTambahRealiasasi bg-blue-600 text-white rounded-md px-4 py-2">
                    Tambah Data Realisasi
                </button>

            </div>

            <!-- Detail Table -->
            <div class="bg-white rounded-lg shadow-sm border p-6 mb-4">

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
                            <?php if (!empty($detail)): ?>
                                <?php $no = 1;
                                foreach ($detail as $d): ?>

                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">1</td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="kategori[]" id="kategori">
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
                                            <input type="text" name="nama_barang[]"
                                                placeholder="Masukkan nama barang"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->nama_barang ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="banyak[]"
                                                placeholder="Masukkan banyak"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->banyak ?>">
                                        </td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="satuan[]">
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
                                            <input type="number" name="harga_satuan[]"
                                                placeholder="Masukkan harga satuan"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->harga_satuan ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="jumlah[]"
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
                <button class="mt-4 text-blue-600 text-sm font-medium" id="btnTambahBaris">
                    + Tambah Baris Baru
                </button>

                <!-- Total -->
                <div class="flex items-center justify-between mt-6 p-4 bg-gray-100 rounded-lg border border-gray-200">

                    <span class="text-sm font-medium text-gray-600">Total</span>

                    <span id="totalSemua" class="text-blue-600 font-semibold">
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
            <div class="card-realisasi bg-white rounded-lg shadow-sm border p-6 mb-4 hidden">

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
                            <?php if (!empty($detail)): ?>
                                <?php $no = 1;
                                foreach ($detail as $d): ?>

                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">1</td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="kategori[]" id="kategori">
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
                                            <input type="text" name="nama_barang[]"
                                                placeholder="Masukkan nama barang"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->nama_barang ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="number" name="banyak[]"
                                                placeholder="Masukkan banyak"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->banyak ?>">
                                        </td>

                                        <td class="p-2">
                                            <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="satuan[]">
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
                                            <input type="number" name="harga_satuan[]"
                                                placeholder="Masukkan harga satuan"
                                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" value="<?= $d->harga_satuan ?>">
                                        </td>

                                        <td class="p-2">
                                            <input type="text" name="jumlah[]"
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
                <button class="mt-4 text-blue-600 text-sm font-medium" id="btnTambahBaris">
                    + Tambah Baris Baru
                </button>

                <!-- Total -->
                <div class="flex items-center justify-between mt-6 p-4 bg-gray-100 rounded-lg border border-gray-200">

                    <span class="text-sm font-medium text-gray-600">Total</span>

                    <span id="totalSemua" class="text-blue-600 font-semibold">
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

            <div class="border border-gray-200 rounded-lg overflow-hidden">

                <!-- 🔝 BAGIAN ATAS (ABU-ABU) -->
                <div class="card-selisih bg-gray-100 px-4 py-3 flex items-center justify-between hidden">
                    <span class="text-sm font-medium text-gray-600">
                        Selisih
                    </span>

                    <span id="selisih" class="text-sm font-semibold text-blue-600">
                        Rp 00,00
                    </span>
                </div>

                <!-- 🔽 BAGIAN BAWAH (PUTIH) -->
                <div class="bg-white px-4 py-3 flex justify-end gap-2">

                    <!-- BATAL -->
                    <button
                        class="px-4 py-2 text-sm text-blue-600 bg-blue-100 border border-blue-300 rounded-md hover:bg-blue-200 transition">
                        Batal
                    </button>

                    <!-- SIMPAN -->
                    <button class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                        Simpan
                    </button>

                </div>

            </div>
        </div>


    </div>

</body>

</html>

<script>
    const btn = document.querySelector('.btnTambahRealiasasi');
    const cardRealisasi = document.querySelector('.card-realisasi');
    const cardSelisih = document.querySelector('.card-selisih');

    btn.addEventListener('click', function() {
        // munculin card
        cardRealisasi.classList.remove('hidden');
        cardSelisih.classList.remove('hidden');

        // ubah style tombol jadi abu-abu
        btn.classList.remove('bg-blue-600');
        btn.classList.add('bg-gray-400');
    });

    document.getElementById("btnSimpan").addEventListener("click", function(e) {

        e.preventDefault();

        let judul = document.getElementById("judul").value;
        let organisasi = document.getElementById("organisasi").value;
        let noticket = document.getElementById("noticket").value;
        let total = document.getElementById("totalSemua").innerText.replace(/[^0-9]/g, ""); // hilangkan Rp & titik

        let kategori = document.querySelectorAll("[name='kategori[]']");
        let nama_barang = document.querySelectorAll("[name='nama_barang[]']");
        let banyak = document.querySelectorAll("[name='banyak[]']");
        let satuan = document.querySelectorAll("[name='satuan[]']");
        let harga_satuan = document.querySelectorAll("[name='harga_satuan[]']");
        let jumlah = document.querySelectorAll("[name='jumlah[]']");

        if (kategori.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "Peringatan",
                text: "Minimal harus ada 1 baris data"
            });
            return;
        }

        for (let i = 0; i < kategori.length; i++) {

            if (
                !kategori[i].value ||
                !nama_barang[i].value ||
                !banyak[i].value ||
                !satuan[i].value ||
                !harga_satuan[i].value
            ) {
                Swal.fire({
                    icon: "warning",
                    title: "Peringatan",
                    text: `Semua field wajib diisi`
                });
                return;
            }
        }

        let formData = new FormData();

        formData.append("noticket", noticket);
        formData.append("judul", judul);
        formData.append("organisasi", organisasi);
        formData.append("total", total);

        for (let i = 0; i < kategori.length; i++) {
            formData.append("kategori[]", kategori[i].value);
            formData.append("nama_barang[]", nama_barang[i].value);
            formData.append("banyak[]", banyak[i].value);
            formData.append("satuan[]", satuan[i].value);
            formData.append("harga_satuan[]", harga_satuan[i].value);
            formData.append("jumlah[]", jumlah[i].value);
        }

        fetch("", {
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
                    }).then(() => {
                        location.reload();
                    })
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: res
                    })
                }

            });

    });

    document.getElementById("btnTambahBaris").addEventListener("click", function() {

        let tbody = document.querySelector("tbody");
        let rowCount = tbody.querySelectorAll("tr").length + 1;

        let newRow = `
        <tr>
            <td class="p-2">${rowCount}</td>

            <td class="p-2">
                <select class="w-full p-2 rounded-md border border-gray-300" name="kategori[]">
                    <option value="">Pilih Kategori</option>
                    
                </select>
            </td>

            <td class="p-2">
                <input type="text" name="nama_barang[]" class="w-full p-2 rounded-md border border-gray-300"  placeholder="Masukkan nama barang">
            </td>

            <td class="p-2">
                <input type="number" name="banyak[]" class="w-full p-2 rounded-md border border-gray-300"  placeholder="Masukkan banyak barang">
            </td>

            <td class="p-2">
                <select class="w-full p-2 rounded-md border border-gray-300" name="satuan[]">
                    <option value="">Pilih Satuan</option>
                    
                </select>
            </td>

            <td class="p-2">
                <input type="number" name="harga_satuan[]" class="w-full p-2 rounded-md border border-gray-300" placeholder="Masukkan harga satuan">
            </td>

            <td class="p-2">
                <input type="text" name="jumlah[]" disabled  class="w-full p-2 rounded-md border border-gray-300 bg-gray-100">
            </td>

            <td class="p-2">
                <button class="btnHapus bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
            </td>
        </tr>
    `;

        tbody.insertAdjacentHTML("beforeend", newRow);
        hitungTotal();
    });

    document.querySelector("tbody").addEventListener("click", function(e) {

        let btn = e.target.closest(".btnHapus");

        if (btn) {

            let row = btn.closest("tr");
            row.remove();
            hitungTotal();

            let rows = document.querySelectorAll("tbody tr");
            rows.forEach((tr, index) => {
                tr.children[0].innerText = index + 1;
            });

        }

    });

    document.querySelector("tbody").addEventListener("input", function(e) {

        let row = e.target.closest("tr");
        if (!row) return;

        let banyak = row.querySelector("[name='banyak[]']").value;
        let harga = row.querySelector("[name='harga_satuan[]']").value;
        let jumlahInput = row.querySelector("[name='jumlah[]']");

        let hasil = (parseFloat(banyak) || 0) * (parseFloat(harga) || 0);

        jumlahInput.value = hasil ? hasil : "";
    });

    function hitungTotal() {

        let jumlahInputs = document.querySelectorAll("[name='jumlah[]']");
        let total = 0;

        jumlahInputs.forEach(input => {

            let value = input.value.replace(/[^0-9]/g, ""); // hilangkan Rp & titik

            total += parseFloat(value) || 0;
        });

        document.getElementById("totalSemua").innerText =
            "Rp " + total.toLocaleString("id-ID");
    }

    document.querySelector("tbody").addEventListener("input", function(e) {

        let row = e.target.closest("tr");
        if (!row) return;

        let banyak = row.querySelector("[name='banyak[]']").value;
        let harga = row.querySelector("[name='harga_satuan[]']").value;
        let jumlahInput = row.querySelector("[name='jumlah[]']");

        let hasil = (parseFloat(banyak) || 0) * (parseFloat(harga) || 0);

        jumlahInput.value = hasil ?
            "Rp " + hasil.toLocaleString("id-ID") :
            "";

        hitungTotal();
    });

    document.getElementById("btnBatal").addEventListener("click", function() {

        Swal.fire({

            html: `
            <div class="flex flex-col items-center text-center">
                
                <!-- ICON -->
                <div>
                    <img src="" 
                         class="w-20 h-20 mx-auto">
                </div>

                <!-- TITLE -->
                <h2 class="text-xl font-semibold text-gray-800 " style="margin-top: 16px;">
                    Data Belum Tersimpan
                </h2>

                <!-- TEXT -->
                <p class="text-gray-500 text-sm">
                    Perubahan Anda belum tersimpan, yakin tutup?
                </p>

            </div>
        `,
            showCancelButton: true,
            confirmButtonText: "Ya, Tutup",
            cancelButtonText: "Tidak"
        }).then((result) => {

            if (result.isConfirmed) {

                // 🔴 Reset header
                document.getElementById("judul").value = "";
                document.getElementById("organisasi").value = "";

                // 🔴 Reset tabel (hapus semua baris)
                let tbody = document.querySelector("tbody");
                tbody.innerHTML = "";

                // 🔴 Tambahkan 1 baris kosong kembali
                let newRow = `
                <tr>
                    <td class="p-2">1</td>

                    <td class="p-2">
                        <select class="w-full p-2 rounded-md border border-gray-300" name="kategori[]">
                            <option value="">Pilih Kategori</option>
                            
                        </select>
                    </td>

                    <td class="p-2">
                        <input type="text" name="nama_barang[]" class="w-full p-2 rounded-md border border-gray-300" placeholder="Masukkan nama barang">
                    </td>

                    <td class="p-2">
                        <input type="number" name="banyak[]" class="w-full p-2 rounded-md border border-gray-300" placeholder="Masukkan banyak barang">
                    </td>

                    <td class="p-2">
                        <select class="w-full p-2 rounded-md border border-gray-300" name="satuan[]">
                            <option value="">Pilih Satuan</option>
                            
                        </select>
                    </td>

                    <td class="p-2">
                        <input type="number" name="harga_satuan[]" class="w-full p-2 rounded-md border border-gray-300" placeholder="Masukkan harga satuan">
                    </td>

                    <td class="p-2">
                        <input type="text" name="jumlah[]" disabled class="w-full p-2 rounded-md border bg-gray-100">
                    </td>

                    <td class="p-2">
                        <button class="btnHapus bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                    </td>
                </tr>
            `;

                tbody.insertAdjacentHTML("beforeend", newRow);

                document.getElementById("totalSemua").innerText = "Rp 0";

            }

        });

    });
</script>