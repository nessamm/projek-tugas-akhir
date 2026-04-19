<!DOCTYPE html>
<html>

<head>
    <title>Pengguna - SmartRAB</title>
    <style>
        table.dataTable thead th {
            padding-right: 30px !important;
            text-align: inherit !important;
        }

        table.dataTable thead th.sorting:before,
        table.dataTable thead th.sorting:after,
        table.dataTable thead th.sorting_asc:before,
        table.dataTable thead th.sorting_asc:after,
        table.dataTable thead th.sorting_desc:before,
        table.dataTable thead th.sorting_desc:after {
            right: 10px !important;
            left: auto !important;
        }

        .dt-column-header {
            text-align: center !important;
        }

        table.dataTable thead th.judul .dt-column-title {
            text-align: left !important;
        }

        /* Container */
        .dt-paging {
            display: flex !important;
            align-items: center;
            gap: 4px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 6px 8px;
        }

        /* Semua tombol */
        .dt-paging-button {
            border: none !important;
            background: transparent !important;
            color: #6b7280 !important;
            padding: 6px 10px !important;
            border-radius: 8px !important;
            font-size: 14px;
            transition: 0.2s;
        }

        /* Hover */
        .dt-paging-button:hover {
            background: #e5e7eb !important;
            color: #374151 !important;
        }

        /* Active (yang biru) */
        .dt-paging .dt-paging-button.current {
            background: #3b82f6 !important;
            color: #ffffff !important;
            font-weight: 500;
        }

        /* Disabled */
        .dt-paging-button.disabled {
            background: #e5e7eb !important;
            color: #9ca3af !important;
            cursor: not-allowed;
        }

        /* Prev & Next spacing */
        .dt-paging-button.previous {
            margin-right: 4px;
        }

        .dt-paging-button.next {
            margin-left: 4px;
        }
    </style>
</head>

<body style="background-color: #F2F6FF;" class="flex min-h-screen">

    <div class="flex-1 ml-64">
        <?php $this->load->view('layout/head'); ?>

        <div class="p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Pengguna - Daftar Pengguna</h2>
                <button
                    class="btnPilihFilter bg-blue-500 text-white px-3 py-2 rounded-md shadow flex items-center gap-2">
                    <?= file_get_contents(FCPATH . 'assets/icons/filter.svg'); ?> Pilih Filter
                </button>
            </div>

            <!-- FILTER -->
            <div class="card-filter bg-white rounded-lg shadow-sm border p-6 mb-6 hidden">
                <div class="flex flex-wrap items-end gap-4">

                    <div class="flex flex-col">
                        <label class="text-bold text-sm text-gray-600 mb-1">Nama Lengkap</label>
                        <input id="filterNama" type="text" placeholder="Masukkan Nama Lengkap"
                            class="w-64 px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-bold text-sm text-gray-600 mb-1">Username</label>
                        <input id="filterUsername" type="text" placeholder="Masukkan Username"
                            class="w-64 px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-bold text-sm text-gray-600 mb-1">Kelas</label>
                        <select id="filterKelas" class="border px-3 py-2 rounded">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($organisasi as $org): ?>
                                <option value="<?= $org->name ?>"><?= $org->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-bold text-sm text-gray-600 mb-1">Gender</label>
                        <select id="filterGender" class="border px-3 py-2 rounded">
                            <option value="">Pilih Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <button id="btnFilter" class="bg-blue-600 text-white px-4 py-2 rounded mb-3">
                        Terapkan
                    </button>

                </div>
            </div>

            <!-- TABLE -->
            <table id="tablePengguna" class="bg-white w-full rounded shadow">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function () {
        const btn = document.querySelector('.btnPilihFilter');
        const cardRealisasi = document.querySelector('.card-filter');


        btn.addEventListener('click', function () {
            cardRealisasi.classList.toggle('hidden');
        });

        var table = $('#tablePengguna').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('C_Pengguna/getData') ?>",
                type: "POST",
                data: function (data) {
                    data.nama = $('#filterNama').val();
                    data.username = $('#filterUsername').val();
                    data.kelas = $('#filterKelas').val();
                    data.gender = $('#filterGender').val();
                }
            },
            columns: [
                { data: null },
                { data: 'fullname' },
                { data: 'username' },
                { data: 'kelas' },
                {
                    data: 'gender',
                    render: function (data) {
                        return data;
                    }
                }
            ],
            pageLength: 10,
            lengthChange: false,
            dom: "t" + "<'flex items-center justify-between mt-6'<'text-sm text-gray-400'i><'custom-pagination'p>>",
            language: {
                paginate: {
                    previous: "Prev",
                    next: "Next",
                    first: "<",
                    last: ">"
                }
            },
            order: [
                [0, 'asc']
            ],
            columnDefs: [{
                targets: [0, 3, 4],
                className: "text-center",
                orderable: true,
            },
            {
                targets: [1, 2],
                className: "judul",
                orderable: true,
            }
            ],
            drawCallback: function (settings) {
                var api = this.api();
                var order = api.order();

                var isAsc = order[0][1] === 'asc';

                var start = settings._iDisplayStart;
                var length = settings._iDisplayLength;
                var total = settings._iRecordsDisplay;

                api.column(0, {
                    search: 'applied',
                    order: 'applied'
                })
                    .nodes()
                    .each(function (cell, i) {

                        if (isAsc) {
                            // 1,2,3
                            cell.innerHTML = start + i + 1;
                        } else {
                            // 3,2,1
                            cell.innerHTML = total - (start + i);
                        }

                    });
            }
        });

        $('#btnFilter').click(function () {

            const nama = $('#filterNama').val().trim();
            const username = $('#filterUsername').val().trim();
            const kelas = $('#filterKelas').val();
            const gender = $('#filterGender').val();


            if (nama === "" && username === "" && kelas === "" && gender === "") {
                Swal.fire({
                    html: `
                        <div class="flex flex-col items-center text-center">
                            
                            <img src="<?= base_url('assets/icons/cross.svg') ?>" 
                                class="w-8 h-8 mt-8 mb-4">

                            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                                Data Masih Kosong
                            </h2>

                            <p class="text-gray-500 text-sm">
                                Anda belum mengisi kolom filter, silakan isi terlebih dahulu!
                            </p>

                        </div>
                    `,
                    confirmButtonText: 'Tutup',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md'
                    }
                });
                return;
            }

            table.ajax.reload();
        });

    });
</script>