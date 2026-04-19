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

                <form id="formLogin" action="<?= base_url('index.php/C_Login/login') ?>" method="POST"
                    class="space-y-4">

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2 text-sm">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email anda"
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm">
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2 text-sm">
                            Kata Sandi
                        </label>

                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda"
                                class="w-full p-2 pr-12 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm">
                            <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2">

                                <img id="eyeOpen" src="<?= base_url('assets/icons/eye.svg') ?>" class="w-5 h-5">

                                <img id="eyeClosed" src="<?= base_url('assets/icons/eye-slash.svg') ?>"
                                    class="w-5 h-5 hidden">

                            </button>
                        </div>
                    </div>

                    <button type="submit" style="background-color: #377DFF; color: white; border-radius: 8px;"
                        class="w-full hover:bg-[#2b68cc] font-semibold py-2 rounded-md transition duration-300">
                        Masuk
                    </button>

                    <p class="text-center text-gray-600 text-sm mt-4">
                        Belum punya akun? <a href="<?= base_url('C_Login/register') ?>"
                            class="text-blue-500 hover:underline">Daftar</a>
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


    document.getElementById("formLogin").addEventListener("submit", function (e) {

        e.preventDefault();

        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        if (email === "") {
            Swal.fire({
                icon: "warning",
                title: "Email belum diisi",
                text: "Silakan masukkan email terlebih dahulu"
            });
            return;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            Swal.fire({
                icon: "error",
                title: "Email tidak valid",
                text: "Masukkan email dengan format yang benar"
            });
            return;
        }

        if (password === "") {
            Swal.fire({
                icon: "warning",
                title: "Password belum diisi",
                text: "Silakan masukkan password"
            });
            return;
        }

        let formData = new FormData(this);

        fetch("<?= base_url('index.php/C_Login/login') ?>", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(res => {

                if (res === "success") {
                    console.log(res);

                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: 'Selamat datang 😊',
                        confirmButtonText: 'Lanjut'
                    }).then(() => {

                        window.location.href = "<?= base_url('C_Login/profile') ?>";

                    });

                } else if (res === "pengguna") {

                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil!',
                        text: 'Selamat datang 😊',
                        confirmButtonText: 'Lanjut'
                    }).then(() => {

                        window.location.href = "<?= base_url('C_Login/admin') ?>";

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