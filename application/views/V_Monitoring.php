<!DOCTYPE html>
<html>
<head>
    <title>Monitoring - SmartRAB</title>
</head>
<body class="bg-gray-100 flex min-h-screen">

<div class="flex min-h-screen">

    <!-- CONTENT -->
    <main class="flex-1 p-10">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Monitoring - Daftar Anggaran</h2>
            <button class="bg-blue-500 text-white px-3 py-2 rounded-lg shadow flex items-center gap-2">
                <?= file_get_contents(FCPATH . 'assets/icons/filter.svg'); ?> Pilih Filter
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">NO</th>
                        <th class="px-6 py-3 text-left">TIKET</th>
                        <th class="px-6 py-3 text-left">JUDUL</th>
                        <th class="px-6 py-3 text-left">ORGANISASI</th>
                        <th class="px-6 py-3 text-left">TERAKHIR DIUPDATE</th>
                        <th class="px-6 py-3 text-center w-40">ACTION</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">RAB260101</td>
                        <td class="px-6 py-4">Laporan Anggaran Dies Natalies</td>
                        <td class="px-6 py-4">Osis</td>
                        <td class="px-6 py-4">03 Feb 2026 11:11:00</td>
                        <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                            <button class="bg-green-100 text-green-600 border border-green-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/download.svg'); ?></button>
                            <button class="bg-yellow-100 text-yellow-600 border border-yellow-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/pencil.svg'); ?></button>
                            <button class="bg-red-100 text-red-600 border border-red-500 px-2 py-2 rounded-lg"><?= file_get_contents(FCPATH . 'assets/icons/trash.svg'); ?></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end mt-6 space-x-2">
            <button class="px-3 py-1 bg-gray-200 rounded">1</button>
            <button class="px-3 py-1 bg-blue-500 text-white rounded">2</button>
            <button class="px-3 py-1 bg-gray-200 rounded">3</button>
        </div>

    </main>
</div>

</body>
</html>