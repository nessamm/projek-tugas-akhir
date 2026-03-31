<!-- HEADER BAR -->
<div class="bg-white shadow px-4 py-3 flex items-center gap-3">

    <button id="btnBack" class="w-9 h-9 flex items-center justify-center rounded-lg 
        text-xl
        hover:bg-gray-100 hover:scale-105 active:scale-95 
        transition-all duration-200">
        &#8249;
    </button>

    <div class="flex items-center gap-6 ml-auto text-sm">

        <!-- USER -->
        <a href="<?= base_url('profile'); ?>" class="flex items-center gap-3 p-2 rounded-lg
            hover:bg-gray-100 hover:shadow-sm hover:scale-105
            transition-all duration-200">
            
            <span class="w-5 h-5">
                <?= file_get_contents(FCPATH . 'assets/icons/user.svg'); ?>
            </span>
        </a>

        <!-- LOGOUT -->
        <a href="#" id="btnLogout" class="flex items-center gap-3 p-2 rounded-lg
            hover:bg-red-100 hover:text-red-500 hover:shadow-sm hover:scale-105
            transition-all duration-200">
            
            <span class="w-5 h-5">
                <?= file_get_contents(FCPATH . 'assets/icons/logout.svg'); ?>
            </span>
        </a>

    </div>

</div>

<script>
document.getElementById('btnLogout').addEventListener('click', function(e) {
    e.preventDefault();

    Swal.fire({
        html: `
            <div class="flex flex-col items-center text-center">
                
                <!-- ICON -->
                <div>
                    <img src="<?= base_url('assets/icons/icon-logout.svg') ?>" 
                         class="w-12 h-12 mx-auto">
                </div>

                <!-- TITLE -->
                <h2 class="text-xl font-semibold text-gray-800 ">
                    Keluar
                </h2>

                <!-- TEXT -->
                <p class="text-gray-500 text-sm">
                    Anda yakin ingin keluar dari akun ini?
                </p>

            </div>
        `,
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya',
        buttonsStyling: false,

        customClass: {
            popup: 'rounded-2xl px-6 py-8',
            
            confirmButton: `
                bg-blue-500 text-white 
                px-8 py-2 rounded-lg 
                ml-2
            `,

            cancelButton: `
                bg-gray-200 text-gray-500 
                px-8 py-2 rounded-lg 
                mr-2
            `,

            actions: 'flex justify-center gap-3 mt-6'
        }

    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: 'Berhasil logout!',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "<?= base_url('logout') ?>";
            });

        }
    });
});

document.getElementById('btnBack').addEventListener('click', function() {
    history.back();
});
</script>