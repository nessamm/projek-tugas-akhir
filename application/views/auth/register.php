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
						Buat Akun
					</h2>
					<p class="text-gray-600 text-sm">
						Untuk melanjutkan, silakan buat akun
					</p>
				</div>

				<form id="formRegister"
					action="<?= base_url('index.php/C_Login/register') ?>"
					method="POST"
					class="space-y-4">

					<!-- Nama -->
					<div>
						<label class="block text-gray-700 font-medium mb-2">
							Nama Lengkap
						</label>
						<input type="text" name="fullname"
							placeholder="Masukkan nama lengkap anda"
							class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
					</div>

					<!-- Username -->
					<div>
						<label class="block text-gray-700 font-medium mb-2">
							Nama Pengguna
						</label>
						<input type="text" name="username"
							placeholder="Masukkan nama pengguna anda"
							class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
					</div>

					<!-- Email -->
					<div>
						<label class="block text-gray-700 font-medium mb-2">
							Email
						</label>
						<input type="email" name="email"
							placeholder="Masukkan email anda"
							class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
					</div>

					<!-- Gender & Kelas -->
					<div class="flex gap-4">
						<div class="flex-1">
							<label class="block text-gray-700 font-medium mb-2">
								Jenis Kelamin
							</label>
							<select name="gender"
								class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
								<option disabled selected>Pilih Jenis Kelamin</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>

						<div class="flex-1">
							<label class="block text-gray-700 font-medium mb-2">
								Kelas
							</label>
							<select name="kelas"
								class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
								<option disabled selected>Pilih Kelas</option>
								<option value="X">X</option>
								<option value="XI">XI</option>
								<option value="XII">XII</option>
								<option value="XII">XIII</option>
							</select>
						</div>
					</div>

					<!-- Password -->
					<div class="relative flex flex-col mb-4">
						<label for="password" class="block text-gray-700 font-medium mb-2">
							Kata Sandi
						</label>
						<div class="relative flex items-center">
							<input type="password" id="password" name="password"
								placeholder="Masukkan kata sandi anda"
								class="w-full p-3 pr-10 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
							<button type="button" id="togglePassword" class="absolute right-3 text-gray-400 hover:text-gray-600">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path id="eyeOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5
                       c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
									<path id="eyeClosed" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M3 3l18 18" />
								</svg>
							</button>
						</div>
						<p id="passwordStrength" class="mt-2 text-sm font-medium"></p>
					</div>

					<!-- Confirm Password -->
					<div class="relative flex flex-col">
						<label for="confirm_password" class="block text-gray-700 font-medium mb-2">
							Konfirmasi Kata Sandi
						</label>
						<div class="relative flex items-center">
							<input type="password" id="confirm_password" name="confirm_password"
								placeholder="Konfirmasi kata sandi anda"
								class="w-full p-3 pr-10 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200">
							<button type="button" id="toggleConfirmPassword" class="absolute right-3 text-gray-400 hover:text-gray-600">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path id="eyeOpenConfirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5
                       c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
									<path id="eyeClosedConfirm" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M3 3l18 18" />
								</svg>
							</button>
						</div>
					</div>

					<!-- Button -->
					<button type="submit"
						class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-300">
						Buat Akun
					</button>

					<p class="text-center text-gray-600 text-sm mt-4">
						Sudah punya akun?
						<a href="<?= base_url('C_Login/login') ?>" class="text-blue-600 hover:underline">
							Masuk
						</a>
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

	// Check password strength
	password.addEventListener('input', () => {
		const val = password.value;
		let strength = '';
		let color = 'text-gray-500';

		if (val.length === 0) {
			strength = '';
		} else if (val.length < 6) {
			strength = 'Lemah';
			color = 'text-red-500';
		} else if (val.match(/[A-Z]/) && val.match(/[0-9]/) && val.length >= 8) {
			strength = 'Kuat';
			color = 'text-green-500';
		} else {
			strength = 'Sedang';
			color = 'text-yellow-500';
		}

		passwordStrength.textContent = `Sandi: ${strength}`;
		passwordStrength.className = `mt-2 text-sm font-medium ${color}`;
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
					Swal.fire({
						icon: 'success',
						title: 'Berhasil!',
						text: 'Registrasi berhasil!',
						confirmButtonText: 'OK'
					}).then(() => {
						window.location.href = "<?= base_url('C_Login/login') ?>";
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
	});
</script>