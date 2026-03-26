<form id="formProfile" class="space-y-4">

    <body class="bg-gray-100 font-sans">

        <div class="flex min-h-screen">

            <!-- SIDEBAR -->
            <?php $this->load->view('layout/sidebar'); ?>

            <!-- CONTENT -->
            <div class="flex-1">

                <!-- HEADER -->
                <?php $this->load->view('layout/head'); ?>

                <div class="p-8">

                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil</h1>

                    <div class="grid grid-cols-12 gap-6">

                        <!-- FORM PROFIL -->
                        <div class="col-span-9 bg-white rounded-xl shadow p-6 space-y-4">

                            <h2 class="text-lg font-semibold text-gray-700 mb-4">
                                Edit Profil
                            </h2>

                            <form class="space-y-4">

                                <div class="grid grid-cols-2 gap-4">

                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">
                                            Nama Lengkap
                                        </label>
                                        <input type="text"
                                            name="fullname"
                                            class="editable w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-200"
                                            value="<?= $user->fullname ?>"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">
                                            Nama Pengguna
                                        </label>
                                        <input type="text"
                                            name="username"
                                            class="editable w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-200"
                                            value="<?= $user->username ?>"
                                            readonly>
                                    </div>

                                </div>

                                <div class="grid grid-cols-3 gap-4">

                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="w-full border rounded-lg px-3 py-2 bg-gray-100"
                                            value="<?= $user->email ?>"
                                            disabled>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">
                                            Jenis Kelamin
                                        </label>
                                        <input type="text"
                                            class="w-full border rounded-lg px-3 py-2 bg-gray-100"
                                            value="<?= $user->gender == 'L' ? 'Laki-laki' : 'Perempuan' ?>"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">
                                            Kelas
                                        </label>

                                        <select
                                            name="kelas"
                                            class="editable readonly-mode w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-200">

                                            <option value="">Pilih Kelas</option>
                                            <option value="X" <?= ($user->kelas == 'X') ? 'selected' : '' ?>>X</option>
                                            <option value="XI" <?= ($user->kelas == 'XI') ? 'selected' : '' ?>>XI</option>
                                            <option value="XII" <?= ($user->kelas == 'XII') ? 'selected' : '' ?>>XII</option>
                                            <option value="XII" <?= ($user->kelas == 'XII') ? 'selected' : '' ?>>XIII</option>

                                        </select>
                                    </div>

                                </div>

                                <!-- BUTTON -->
                                <div class="flex justify-end gap-3 pt-4">

                                    <button id="btnCancel"
                                        type="button"
                                        class="px-5 py-2 rounded-lg border border-blue-500 text-blue-500 hover:bg-blue-50"
                                        disabled>
                                        Batal
                                    </button>

                                    <button id="btnSave"
                                        type="submit"
                                        class="px-5 py-2 rounded-lg bg-blue-300 text-white cursor-not-allowed"
                                        disabled>
                                        Simpan
                                    </button>

                                </div>

                            </form>

                        </div>

                        <!-- CARD STAT -->
                        <div class="col-span-3 flex flex-col gap-4">

                            <!-- CARD 1 -->
                            <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between flex-1">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Input</p>
                                    <h2 class="text-3xl font-bold text-gray-800">2040</h2>
                                </div>

                                <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <?= file_get_contents(FCPATH . 'assets/icons/clock24.svg'); ?>
                                </div>
                            </div>

                            <!-- CARD 2 -->
                            <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between flex-1">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Dokumen</p>
                                    <h2 class="text-3xl font-bold text-gray-800">2040</h2>
                                </div>

                                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                                    <?= file_get_contents(FCPATH . 'assets/icons/download24.svg'); ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

    </body>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const fields = document.querySelectorAll('.editable');
        const btnSave = document.getElementById('btnSave');
        const btnCancel = document.getElementById('btnCancel');

        fields.forEach(field => {

            // simpan nilai awal
            field.dataset.initial = field.value;

            field.addEventListener('click', function() {

                if (field.tagName === "SELECT") {
                    field.removeAttribute("disabled");
                } else {
                    field.removeAttribute("readonly");
                }

            });

            field.addEventListener('input', checkChanges);
            field.addEventListener('change', checkChanges);

        });

        function checkChanges() {

            let changed = false;

            fields.forEach(field => {
                if (field.value !== field.dataset.initial) {
                    changed = true;
                }
            });

            if (changed) {

                btnSave.disabled = false;
                btnSave.classList.remove('bg-blue-300', 'cursor-not-allowed');
                btnSave.classList.add('bg-blue-500');

                btnCancel.disabled = false;

            } else {

                btnSave.disabled = true;
                btnSave.classList.add('bg-blue-300', 'cursor-not-allowed');
                btnSave.classList.remove('bg-blue-500');

                btnCancel.disabled = true;

            }

        }

        btnCancel.addEventListener("click", function() {

            fields.forEach(field => {

                field.value = field.dataset.initial;

                if (field.tagName === "SELECT") {
                    field.setAttribute("disabled", true);
                } else {
                    field.setAttribute("readonly", true);
                }

            });

            checkChanges();

        });

    });

    document.getElementById("formProfile").addEventListener("submit", function(e) {

        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        Swal.fire({
            title: "Ubah Profil?",
            text: "Apakah yakin ingin memperbarui profil?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Simpan",
            cancelButtonText: "Batal"
        }).then((result) => {

            if (result.isConfirmed) {

                fetch("<?= base_url('C_Login/updateProfile') ?>", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.text())
                    .then(res => {

                        if (res == "success") {

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Profil berhasil diperbarui"
                            }).then(() => {
                                location.reload();
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Gagal",
                                text: res
                            });

                        }

                    });

            }

        });

    });
</script>