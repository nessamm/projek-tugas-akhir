<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Input Anggaran</title>
</head>

<body class="bg-gray-100 flex min-h-screen">

<div class="flex-1">
    <!-- HEADER BAR -->
    <div class="bg-white shadow px-4 py-3 flex items-center gap-3">

        <button class="w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100">
            &#8249;
        </button>

        <button class="w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100">
            &#8250;
        </button>

    </div>

    <div class="p-8">
        <!-- Title -->
        <h1 class="text-2xl font-semibold mb-6">Input Anggaran</h1>
    
        <!-- Detail Header -->
        <div class="bg-white rounded-lg shadow-sm border p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">Detail Header</h2>
    
            <div class="grid grid-cols-3 gap-4">
    
                <div>
                    <label class="text-sm text-gray-600">Tiket</label>
                    <input disable type="text" value="RAB0109101" class="w-full mt-1 border rounded-lg px-3 py-2">
                </div>
    
                <div>
                    <label class="text-sm text-gray-600">Judul</label>
                    <input type="text"
                        placeholder="Masukkan Judul Laporan"
                        class="w-full mt-1 border rounded-lg px-3 py-2">
                </div>
    
                <div>
                    <label class="text-sm text-gray-600">Organisasi</label>
                    <select class="w-full mt-1 border rounded-lg px-3 py-2">
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
                                <select class="border rounded-lg px-2 py-1 w-full">
                                    <option>Pilih kategori</option>
                                </select>
                            </td>
    
                            <td class="p-2">
                                <input type="text"
                                    placeholder="Masukkan nama barang"
                                    class="border rounded-lg px-2 py-1 w-full">
                            </td>
    
                            <td class="p-2">
                                <input type="number"
                                    placeholder="Masukkan banyak"
                                    class="border rounded-lg px-2 py-1 w-full">
                            </td>
    
                            <td class="p-2">
                                <select class="border rounded-lg px-2 py-1 w-full">
                                    <option>Pilih satuan</option>
                                </select>
                            </td>
    
                            <td class="p-2">
                                <input type="number"
                                    placeholder="Masukkan harga satuan"
                                    class="border rounded-lg px-2 py-1 w-full">
                            </td>
    
                            <td class="p-2">
                                <input type="text"
                                    disabled
                                    class="border rounded-lg px-2 py-1 w-full bg-gray-100">
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
    
                <button class="px-4 py-2 bg-gray-200 rounded-lg">
                    Batal
                </button>
    
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
    
            </div>
    
        </div>
    </div>


</div>

</body>
</html>