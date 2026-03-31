<!-- SIDEBAR -->
<aside class="fixed left-0 top-0 w-64 h-screen bg-white shadow-lg flex flex-col">

    <div class="flex justify-center mb-2 p-6">
        <img src="<?= base_url('assets/img/logo.png') ?>"
            alt="SmartRAB Logo"
            class="w-36 h-auto object-contain">
    </div>

    <div class="flex flex-col items-center mb-6 p-6">

        <div class="w-20 h-20 mb-3">
            <img src="<?= base_url('assets/icons/profile.svg'); ?>"
                alt="Profile"
                class="w-full h-full object-cover">
        </div>

        <p class="font-semibold">
            <?= $this->session->userdata('fullname') ? $this->session->userdata('fullname') : 'Guest'; ?>
        </p>
        <span class="text-sm text-gray-400"><?= $this->session->userdata('role') == 1 ? 'admin' : 'user'; ?></span>

    </div>

    <nav class="space-y-3 px-2">
        <!-- Monitoring -->
        <div class="menu-item flex gap-2 pr-6 cursor-pointer h-[50px]" style="height: 50px;">
            <div class="indicator w-1 rounded-lg transition-all duration-300"></div>
            <a href="<?= site_url('pengguna'); ?>" 
               class="menu-link flex items-center justify-center w-full px-4 rounded-lg transition-all duration-300 hover:bg-gray-100">
                Pengguna
            </a>
        </div>

        <!-- Input Anggaran -->
        <div class="menu-item flex gap-2 pr-6 cursor-pointer h-[50px]" style="height: 50px;">
            <div class="indicator w-1 rounded-lg transition-all duration-300"></div>
            <a href="<?= site_url('master'); ?>" 
               class="menu-link flex items-center justify-center w-full px-4 rounded-lg transition-all duration-300 hover:bg-gray-100">
                Master
            </a>
        </div>
    </nav>
</aside>

<script>
    const menuItems = document.querySelectorAll('.menu-item');
    const currentUrl = window.location.href;

    menuItems.forEach(item => {
        const link = item.querySelector('.menu-link');

        // Cek apakah url sama dengan halaman sekarang
        if (currentUrl.includes(link.getAttribute('href'))) {

            item.querySelector('.indicator')
                .classList.add('bg-blue-500');

            link.classList.add('bg-blue-500', 'text-white');
            link.classList.remove('hover:bg-gray-100');
        }

        item.addEventListener('click', function() {

            menuItems.forEach(menu => {
                menu.querySelector('.indicator')
                    .classList.remove('bg-blue-500');

                menu.querySelector('.menu-link')
                    .classList.remove('bg-blue-500', 'text-white');

                menu.querySelector('.menu-link')
                    .classList.add('hover:bg-gray-100');
            });

            this.querySelector('.indicator')
                .classList.add('bg-blue-500');

            this.querySelector('.menu-link')
                .classList.add('bg-blue-500', 'text-white');

            this.querySelector('.menu-link')
                .classList.remove('hover:bg-gray-100');
        });
    });
</script>