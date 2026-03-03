<div class="min-h-screen bg-gradient-to-tr from-white via-pink-50 via-blue-50 to-blue-200 
            relative flex items-center justify-center px-6 lg:px-20 py-10">

    <!-- LEFT TEXT -->
    <div class="w-full lg:w-auto
            text-left
            max-w-md
            mx-auto
            mb-10" style="padding-left: 50px;">

        <h1 class="text-gray-800 text-3xl lg:text-4xl font-bold mb-4">
            Log In
        </h1>
        <p class="text-gray-700 text-base lg:text-lg">
            Buat RAB lebih cepat, rapi, dan siap ekspor ke Excel<br>
            tanpa perlu formatting manual.
        </p>
    </div>

    <!-- RIGHT CARD -->
    <div class="w-full flex justify-center
                lg:absolute lg:right-10 lg:top-1/2
                lg:-translate-y-1/2 lg:-translate-x-5">

        <div class="bg-white bg-opacity-80 p-8 lg:p-12 
                    rounded-3xl shadow-2xl 
                    w-full max-w-md lg:w-[36rem]">

            <div class="mb-6">
                <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold mb-2">
                    Login
                </h2>
                <p class="text-gray-600 text-sm">
                    Lorem Ipsum
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
                        Password
                    </label>

                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Masukkan password"
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
                    Log In
                </button>

                <p class="text-center text-gray-600 text-sm mt-4">
                    Belum punya akun? <a href="<?= base_url('C_Login/register') ?>" class="text-blue-500 hover:underline">Daftar</a>
                </p>

            </form>

        </div>
    </div>

</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        eyeOpen.classList.toggle('hidden');
        eyeClosed.classList.toggle('hidden');
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('confirm_password');
    const eyeOpenConfirm = document.getElementById('eyeOpenConfirm');
    const eyeClosedConfirm = document.getElementById('eyeClosedConfirm');

    toggleConfirmPassword.addEventListener('click', () => {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        eyeOpenConfirm.classList.toggle('hidden');
        eyeClosedConfirm.classList.toggle('hidden');
    });


    document.getElementById("formRegister").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch("<?= base_url('index.php/C_Login/register') ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(res => {

                if (res === "success") {
                    alert("Registrasi berhasil!");
                    window.location.href = "<?= base_url('C_Login/login') ?>";
                } else {
                    alert(res);
                }

            })
            .catch(error => {
                alert("Terjadi kesalahan!");
                console.log(error);
            });
    });
</script>