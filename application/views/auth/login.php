<body class="font-sans">
    <div class="min-h-screen 
            bg-gradient-to-tr from-white via-pink-50 via-blue-50 to-blue-200 
            flex items-center justify-center px-6 py-10">

        <div class="flex w-full max-w-5xl 
            shadow-2xl rounded-3xl overflow-hidden 
            bg-white items-stretch">

            <!-- KIRI -->
            <div class="w-full lg:w-1/2 flex flex-col">

                <!-- FOTO -->
                <div class="flex-1 bg-cover bg-center"
                    style="background-image: url('<?= base_url('assets/img/bg.jpeg') ?>');">
                </div>

                <!-- TEXT -->
                <div class="p-10 bg-gradient-to-tr from-blue-50 to-white">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">
                        Simplify Your RAB
                    </h1>
                    <p class="text-gray-600">
                        Buat RAB lebih cepat, rapi, dan siap ekspor ke Excel
                        tanpa perlu formatting manual.
                    </p>
                </div>

            </div>

            <!-- KANAN -->
            <div class="w-full lg:w-1/2 p-8 lg:p-10">

                <div class="mb-6">
                    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold mb-2">
                        Masuk
                    </h2>
                    <p class="text-gray-600 text-sm">
                        Untuk melanjutkan, silakan buat akun
                    </p>
                </div>

                <form id="formLogin"
                    action="<?= base_url('index.php/C_Login/login') ?>"
                    method="POST"
                    class="space-y-4">

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email anda"
                            class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-200">
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Kata Sandi
                        </label>

                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda"
                                class="w-full p-3 pr-12 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-200">
                            <button type="button" id="togglePassword" aria-label="Tahan untuk melihat password" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path id="eyeOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5 c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path id="eyeClosed" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        style="background-color: #377DFF; color: white; border-radius: 8px;"
                        class="w-full hover:bg-[#2b68cc] font-semibold py-3 rounded-md transition duration-300">
                        Masuk
                    </button>

                    <p class="text-center text-gray-600 text-sm mt-4">
                        Belum punya akun? <a href="<?= base_url('C_Login/register') ?>" class="text-blue-500 hover:underline">Daftar</a>
                    </p>

                </form>

            </div>

        </div>

    </div>
</body>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');
    const passwordStrength = document.getElementById('passwordStrength');

    togglePassword.addEventListener('click', () => {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        eyeOpen.classList.toggle('hidden');
        eyeClosed.classList.toggle('hidden');
    });


    document.getElementById("formLogin").addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch("<?= base_url('index.php/C_Login/login') ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(res => {
                if (res === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: 'Selamat datang 😊',
                        confirmButtonText: 'Lanjut'
                    }).then(() => {
                        window.location.href = "<?= base_url('C_Login/profile') ?>"; 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: res,
                        confirmButtonText: 'Coba Lagi'
                    });
                }
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Silakan coba lagi nanti.',
                    confirmButtonText: 'Tutup'
                });
                console.error(err);
            });
    });
</script>