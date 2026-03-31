<!DOCTYPE html>
<html>
<head>
    <title>Pengguna - SmartRAB</title>
</head>
<body style="background-color: #F2F6FF;" class="flex min-h-screen">

<div class="flex-1 ml-64">
    <?php $this->load->view('layout/head'); ?>

    <!-- CONTENT -->
    <div class="p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Pengguna - Daftar Pengguna</h2>
            <button class="bg-blue-500 text-white px-3 py-2 rounded-lg shadow flex items-center gap-2">
                <?= file_get_contents(FCPATH . 'assets/icons/filter.svg'); ?> Pilih Filter
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full table-fixed text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-6 py-3 w-10 text-center">NO</th>
                    <th class="px-6 py-3 w-96 text-left">Nama Lengkap</th>
                    <th class="px-6 py-3 w-32 text-center">Kelas</th>
                    <th class="px-6 py-3 w-32 text-center">Gender</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">1</td>
                    <td class="px-6 py-4 truncate">Afwa Rifatika</td>
                    <td class="px-6 py-4 text-center">XIII</td>
                    <td class="px-6 py-4 text-center">Perempuan</td>
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
