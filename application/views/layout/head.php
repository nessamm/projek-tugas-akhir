<!-- HEADER BAR -->
<div class="bg-white shadow px-4 py-3 flex items-center gap-3">

    <button class="w-9 h-9 flex items-center justify-center rounded-lg 
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
        <a href="#" class="flex items-center gap-3 p-2 rounded-lg
            hover:bg-red-100 hover:text-red-500 hover:shadow-sm hover:scale-105
            transition-all duration-200">
            
            <span class="w-5 h-5">
                <?= file_get_contents(FCPATH . 'assets/icons/logout.svg'); ?>
            </span>
        </a>

    </div>

</div>