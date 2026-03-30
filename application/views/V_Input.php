<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Input Anggaran</title>
</head>

<body class="bg-gray-100 flex min-h-screen">

    <div class="flex-1 ml-64">
        <!-- HEADER BAR -->
        <?php $this->load->view('layout/head'); ?>

        <div class="p-8">
            <!-- Title -->
            <h1 class="text-2xl font-semibold mb-6">Input Anggaran</h1>

            <!-- Detail Header -->
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
                        <label class="text-sm text-gray-600">Judul</label>
                        <input type="text" name="judul" id="judul"
                            placeholder="Masukkan Judul Laporan"
                            class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Organisasi</label>
                        <select class="text-sm mt-1 px-3 py-2 w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200" name="organisasi">
                            <option>Pilih organisasi</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Detail Table -->
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

                            <!-- Row -->
                            <tr>
                                <td class="p-2">1</td>

                                <td class="p-2">
                                    <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                        <option>Pilih kategori</option>
                                    </select>
                                </td>

                                <td class="p-2">
                                    <input type="text"
                                        placeholder="Masukkan nama barang"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <input type="number"
                                        placeholder="Masukkan banyak"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <select class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                        <option>Pilih satuan</option>
                                    </select>
                                </td>

                                <td class="p-2">
                                    <input type="number"
                                        placeholder="Masukkan harga satuan"
                                        class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200">
                                </td>

                                <td class="p-2">
                                    <input type="text"
                                        disabled
                                        class="w-full p-2 rounded-md border border-gray-300 bg-gray-100">
                                </td>

                                <td class="p-2">
                                    <button class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

                <!-- Add Row -->
                <button class="mt-4 text-blue-600 text-sm font-medium">
                    + Tambah Baris Baru
                </button>

                <!-- Total -->
                <div class="flex justify-between items-center mt-6 border-t pt-4">

                    <span class="font-semibold">Total</span>

                    <span class="text-blue-600 font-semibold">
                        Rp 0,00
                    </span>

                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 mt-6">

                    <button class="px-4 py-2 bg-gray-200 rounded-md">
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
    document.getElementById("btnSimpan").addEventListener("click", function() {

        let noticket = document.getElementById("noticket").value;
        let judul = document.getElementById("judul").value;
        // let organisasi = document.getElementById("organisasi").value;

        let formData = new FormData();

        formData.append("noticket", noticket);
        formData.append("judul", judul);
        // formData.append("organisasi", organisasi);

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
                        text: "Header berhasil disimpan"
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

            })

    });

</script>