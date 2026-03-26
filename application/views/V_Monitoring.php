<!DOCTYPE html>
<html>
<head>
    <title>Monitoring - SmartRAB</title>
</head>
<body class="bg-gray-100 flex min-h-screen">

<div class="flex-1">
    <?php $this->load->view('layout/head'); ?>

    <!-- CONTENT -->
    <div class="p-8">

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
        <div class="flex items-center justify-between mt-6">

            <!-- Showing -->
            <div class="text-sm text-gray-500">
                Showing 1 of 1
            </div>

            <!-- Pagination -->
            <div class="flex items-center bg-white border rounded-lg px-2 py-1 space-x-1">

                <!-- Prev -->
                <button class="px-3 py-1.5 bg-gray-200 text-gray-500 rounded-md hover:bg-gray-300 transition">
                    &#8249;
                </button>
                <span class="text-sm text-gray-400 px-1">Prev</span>

                <!-- Numbers -->
                <button class="px-3 py-1 text-gray-600 rounded-md hover:bg-gray-200 transition">
                    1
                </button>

                <button class="px-3 py-1 bg-blue-500 text-white rounded-md font-medium">
                    2
                </button>

                <button class="px-3 py-1 text-gray-600 rounded-md hover:bg-gray-200 transition">
                    3
                </button>

                <button class="px-3 py-1 text-gray-600 rounded-md hover:bg-gray-200 transition">
                    4
                </button>

                <button class="px-3 py-1 text-gray-600 rounded-md hover:bg-gray-200 transition">
                    5
                </button>

                <!-- Next -->
                <span class="text-sm text-gray-400 px-1">Next</span>
                <button class="px-3 py-1.5 bg-gray-200 text-gray-500 rounded-md hover:bg-gray-300 transition">
                    &#8250;
                </button>

            </div>

        </div>
    </div>
</div>

</body>
</html>