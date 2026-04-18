<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Input Anggaran</title>
</head>

<body class="bg-gray-100 flex min-h-screen">

    <div class="flex-1 ml-64">
        <?php $this->load->view('layout/head'); ?>

        <div class="p-8">
            <h1 class="text-2xl font-semibold mb-6">Input Anggaran</h1>

            <div class="bg-white rounded-lg shadow-sm border p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Detail Header</h2>

                <div class="grid grid-cols-3 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Tiket</label>
                        <input disabled type="text"
                            value="<?= $noticket ?>"
                            class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300">
                    </div>
                    <input type="hidden" name="noticket" id="noticket" value="<?= $noticket ?>">

                    <div>
                        <label class="text-sm text-gray-600">Nama Kegiatan</label>
                        <input type="text" name="judul" id="judul"
                            placeholder="Masukkan Nama Kegiatan"
                            class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Organisasi</label>
                        <select class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="organisasi" id="organisasi">
                            <option value="">Pilih organisasi</option>

                            <?php foreach ($organisasi as $org): ?>
                                <option value="<?= $org->code ?>">
                                    <?= $org->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border p-6">

                <h2 class="text-lg font-semibold mb-4">Detail Tabel</h2>

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

                            <tr>
                                <td class="p-2">1</td>

                                <td class="p-2">
                                    <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="kategori[]" id="kategori">
                                        <option value="">Pilih Kategori</option>

                                        <?php foreach ($kategori as $ktg): ?>
                                            <option value="<?= $ktg->code ?>">
                                                <?= $ktg->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                                <td class="p-2">
                                    <input type="text" name="nama_barang[]"
                                        placeholder="Masukkan nama barang"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <input type="number" name="banyak[]"
                                        placeholder="Masukkan banyak"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="satuan[]">
                                        <option value="">Pilih Satuan</option>

                                        <?php foreach ($satuan as $stn): ?>
                                            <option value="<?= $stn->code ?>">
                                                <?= $stn->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                                <td class="p-2">
                                    <input type="number" name="harga_satuan[]"
                                        placeholder="Masukkan harga satuan"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <input type="text" name="jumlah[]"
                                        disabled
                                        class="w-full p-2 rounded-md border border-gray-300 bg-gray-100">
                                </td>

                                <td class="p-2">
                                    <button class="btnHapus bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

                <button class="mt-4 text-blue-600 text-sm font-medium" id="btnTambahBaris">
                    + Tambah Baris Baru
                </button>

                <div class="flex justify-between items-center mt-6 border-t pt-4">

                    <span class="font-semibold">Total</span>

                    <span id="totalSemua" class="text-blue-600 font-semibold">
                        Rp 0
                    </span>

                </div>

                <div class="flex justify-end gap-3 mt-6">

                    <button class="px-4 py-2 bg-gray-200 rounded-md" id="btnBatal">
                        Batal
                    </button>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md" id="btnSimpan">
                        Simpan
                    </button>

                </div>

            </div>
        </div>


    </div>

</body>

</html>

<script>
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
                !judul ||
                !organisasi ||
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

        fetch("<?= base_url('C_Input/simpanHeader') ?>", {
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
                    <?php foreach ($kategori as $ktg): ?>
                        <option value="<?= $ktg->code ?>"><?= $ktg->name ?></option>
                    <?php endforeach; ?>
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
                    <?php foreach ($satuan as $stn): ?>
                        <option value="<?= $stn->code ?>"><?= $stn->name ?></option>
                    <?php endforeach; ?>
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
                    <img src="<?= base_url('assets/icons/upload.svg') ?>" 
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

                document.getElementById("judul").value = "";
                document.getElementById("organisasi").value = "";

                let tbody = document.querySelector("tbody");
                tbody.innerHTML = "";

                let newRow = `
                <tr>
                    <td class="p-2">1</td>

                    <td class="p-2">
                        <select class="w-full p-2 rounded-md border border-gray-300" name="kategori[]">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $ktg): ?>
                                <option value="<?= $ktg->code ?>"><?= $ktg->name ?></option>
                            <?php endforeach; ?>
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
                            <?php foreach ($satuan as $stn): ?>
                                <option value="<?= $stn->code ?>"><?= $stn->name ?></option>
                            <?php endforeach; ?>
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