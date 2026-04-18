<!DOCTYPE html>
<html>

<head>
    <title>Monitoring - SmartRAB</title>
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

<body class="bg-gray-100 flex min-h-screen">

    <div class="flex-1 ml-64">
        <?php $this->load->view('layout/head'); ?>

        <div class="p-8">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Monitoring - Daftar Anggaran</h2>
                <button class="btnPilihFilter bg-blue-500 text-white px-3 py-2 rounded-md shadow flex items-center gap-2">
                    <?= file_get_contents(FCPATH . 'assets/icons/filter.svg'); ?> Pilih Filter
                </button>
            </div>

            <div class="card-filter bg-white rounded-lg shadow-sm border p-6 mb-6 hidden">
                <div class="flex flex-wrap items-end gap-4">

                    <div class="flex flex-col">
                        <label class="text-bold text-sm text-gray-600 mb-1">Tiket</label>
                        <input id="filterTiket" type="text" placeholder="Masukkan No Tiket"
                            class="w-64 px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-sm text-gray-600 mb-1">Nama Kegiatan</label>
                        <input id="filterJudul" type="text" placeholder="Masukkan Nama Kegiatan"
                            class="w-64 px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-sm text-gray-600 mb-1">Organisasi</label>
                        <select
                            id="filterOrganisasi" class="w-52 px-3 py-2 border rounded-md text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Organisasi</option>
                            <?php foreach ($organisasi as $org): ?>
                                <option value="<?= $org->code ?>">
                                    <?= $org->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-sm text-gray-600 mb-1">Periode</label>
                        <input id="filterPeriode" type="date"
                            class="w-48 px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <button id="btnFilter" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm mb-3">
                            Terapkan
                        </button>
                    </div>

                </div>
            </div>

            <div>
                <table id="tableMonitoring"
                    class="bg-white rounded-xl shadow overflow-hidden min-w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="px-6 py-3">NO</th>
                            <th class="px-6 py-3">Tiket</th>
                            <th class="px-6 py-3">Nama Kegiatan</th>
                            <th class="px-6 py-3">Organisasi</th>
                            <th class="px-6 py-3">Terakhir Diperbarui</th>
                            <th class="px-6 py-3 w-40">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    const btn = document.querySelector('.btnPilihFilter');
    const cardRealisasi = document.querySelector('.card-filter');


    btn.addEventListener('click', function() {
        cardRealisasi.classList.remove('hidden');
    });

    $(document).ready(function() {
        var table = $('#tableMonitoring').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('C_Monitoring/getData') ?>",
                type: "POST",
                data: function(data) {
                    data.tiket = $('#filterTiket').val();
                    data.judul = $('#filterJudul').val();
                    data.organisasi = $('#filterOrganisasi').val();
                    data.periode = $('#filterPeriode').val();
                }
            },
            columns: [{
                    data: null
                }, // NO
                {
                    data: "noticket"
                },
                {
                    data: "judul"
                },
                {
                    data: "organisasi"
                },
                {
                    data: "timeinput"
                },
                {
                    data: "id",
                    orderable: false,
                    render: function(data, type, row) {
                        return `
                            <div class="flex items-center justify-center gap-2">

                                <a href="<?= base_url('C_Monitoring/edit/') ?>${data}" 
                                class="bg-yellow-100 text-yellow-600 border border-yellow-500 p-2 rounded-lg flex items-center justify-center">
                                    <img src="<?= base_url('assets/icons/pencil.svg') ?>" class="w-4 h-4">
                                </a>

                                <a href="<?= base_url('C_Export/export_excel_full/') ?>${data}" 
                                class="bg-green-100 text-green-600 border border-green-500 p-2 rounded-lg flex items-center justify-center"
                                title="Export Excel">

                                    <img src="<?= base_url('assets/icons/download.svg') ?>" class="w-4 h-4">
                                </a>

                                <button class="btn-delete bg-red-100 text-red-600 border border-red-500 p-2 rounded-lg flex items-center justify-center" data-id="${data}">
                                    <img src="<?= base_url('assets/icons/trash.svg') ?>" class="w-4 h-4">
                                </button>

                            </div>
                        `;
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
                    targets: [0, 1, 3, 4, 5],
                    className: "text-center",
                    orderable: true,
                },
                {
                    targets: [2],
                    className: "judul",
                    orderable: true,
                }
            ],
            drawCallback: function(settings) {
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
                    .each(function(cell, i) {

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

        $(document).on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            window.location.href = "<?= base_url('C_Monitoring/edit/') ?>" + id;
        });

        $('#btnFilter').on('click', function() {
            table.ajax.reload();
        });
    });

    $(document).on('click', '.btn-delete', function() {
        let id = $(this).data('id');

        Swal.fire({
            title: "Yakin hapus?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            imageUrl: "<?= base_url('assets/icons/trash.svg') ?>",
            imageWidth: 60,
            imageHeight: 60,
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?= base_url('C_Monitoring/delete/') ?>" + id,
                    type: "POST",
                    success: function(res) {

                        if (res == "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Data berhasil dihapus"
                            });

                            $('#tableMonitoring').DataTable().ajax.reload();

                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Gagal",
                                text: res
                            });
                        }
                    }
                });

            }

        });
    });
</script>