<body class="font-sans">
	<div class="min-h-screen 
            bg-gradient-to-tr from-white via-pink-50 via-blue-50 to-blue-200 
            flex items-center justify-center px-6 py-10">

		<div class="flex w-full max-w-5xl 
            shadow-2xl rounded-3xl overflow-hidden 
            bg-white items-stretch">

			<div class="w-full lg:w-1/2 flex flex-col">

				<div class="flex-1 bg-cover bg-center"
					style="background-image: url('<?= base_url('assets/img/bg.jpeg') ?>');">
				</div>

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

					<div>
						<label class="block text-gray-700 font-medium mb-2 text-sm">
							Nama Lengkap
						</label>
						<input type="text" name="fullname"
							placeholder="Masukkan nama lengkap anda"
							class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
					</div>

					<div>
						<label class="block text-gray-700 font-medium mb-2 text-sm">
							Nama Pengguna
						</label>
						<input type="text" name="username"
							placeholder="Masukkan nama pengguna anda"
							class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
					</div>

					<div>
						<label class="block text-gray-700 font-medium mb-2 text-sm">
							Email
						</label>
						<input type="email" name="email"
							placeholder="Masukkan email anda"
							class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
					</div>

					<div class="flex gap-4">
						<div class="flex-1">
							<label class="block text-gray-700 font-medium mb-2 text-sm">
								Jenis Kelamin
							</label>
							<select name="gender"
								class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
								<option disabled selected>Pilih Jenis Kelamin</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>

						<div class="flex-1">
							<label class="block text-gray-700 font-medium mb-2 text-sm">
								Kelas
							</label>
							<select name="kelas"
								class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
								<option disabled selected>Pilih Kelas</option>
								<?php foreach ($kelas as $kls): ?>
									<option value="<?= $kls->code ?>">
										<?= $kls->name ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="relative flex flex-col mb-4">
						<label for="password" class="block text-gray-700 font-medium mb-2 text-sm">
							Kata Sandi
						</label>
						<div class="relative flex items-center">
							<input type="password" id="password" name="password"
								placeholder="Masukkan kata sandi anda"
								class="w-full p-2 pr-10 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
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

					<div class="relative flex flex-col">
						<label for="confirm_password" class="block text-gray-700 font-medium mb-2 text-sm">
							Konfirmasi Kata Sandi
						</label>
						<div class="relative flex items-center">
							<input type="password" id="confirm_password" name="confirm_password"
								placeholder="Konfirmasi kata sandi anda"
								class="w-full p-2 pr-10 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-200 text-sm">
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

					<button type="submit"
						class="w-full bg-blue-600 hover:bg-[#2b68cc] text-white font-semibold py-2 rounded-md transition duration-300">
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

	const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
	const confirmPassword = document.getElementById('confirm_password');
	const eyeOpenConfirm = document.getElementById('eyeOpenConfirm');
	const eyeClosedConfirm = document.getElementById('eyeClosedConfirm');

	toggleConfirmPassword.addEventListener('click', () => {

		const type = confirmPassword.type === 'password' ? 'text' : 'password';
		confirmPassword.type = type;

		eyeOpenConfirm.classList.toggle('hidden');
		eyeClosedConfirm.classList.toggle('hidden');

	});

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

		const fullname = document.querySelector('input[name="fullname"]').value.trim();
		const username = document.querySelector('input[name="username"]').value.trim();
		const email = document.querySelector('input[name="email"]').value.trim();
		const password = document.getElementById("password").value;
		const confirmPassword = document.getElementById("confirm_password").value;

		if (fullname === "" || username === "" || email === "" || password === "" || confirmPassword === "") {

			Swal.fire({
				icon: "warning",
				title: "Form belum lengkap",
				text: "Semua field harus diisi"
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

		const strongPassword = password.length >= 8 &&
			/[A-Z]/.test(password) &&
			/[0-9]/.test(password);

		if (!strongPassword) {

			Swal.fire({
				icon: "warning",
				title: "Password Lemah",
				text: "Password minimal 8 karakter, ada huruf besar dan angka."
			});

			return;
		}

		if (password !== confirmPassword) {

			Swal.fire({
				icon: "error",
				title: "Password Tidak Sama"
			});

			return;
		}

		let formData = new FormData(this);

		fetch("<?= base_url('index.php/C_Login/register') ?>", {
				method: "POST",
				body: formData
			})
			.then(res => res.text())
			.then(res => {

				if (res === "success") {

					Swal.fire({
						icon: 'success',
						title: 'Berhasil!',
						text: 'Registrasi berhasil!'
					}).then(() => {

						window.location.href = "<?= base_url('C_Login/login') ?>";

					});

				} else {

					Swal.fire({
						icon: 'error',
						title: 'Gagal',
						text: res
					});

				}

			});

	});
</script>