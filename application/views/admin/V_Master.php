<!DOCTYPE html>
<html>
<head>
    <title>Mater - SmartRAB</title>
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
            <button class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
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

            <button class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
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

            <button class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
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

            <button class="flex items-center gap-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 transition">
                <?= file_get_contents(FCPATH . 'assets/icons/plus.svg'); ?>
                Tambah Data
            </button>
        </div>

    </div>
</div>

</body>
</html>