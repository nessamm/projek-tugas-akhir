<head>
    <meta charset="UTF-8">
    <title>SmartRAB</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/LogoIpsum.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="<?= base_url('assets/css/select2.min.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2@11.js') ?>"></script>

    <style>
        /* Container */
        .select2-container--default .select2-selection--single {
            height: 3rem;
            /* sama dengan input Tailwind */
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            /* rounded-xl */
            border: 1px solid #d1d5db;
            /* Tailwind gray-300 */
            background-color: white;
        }

        /* Teks yang tampil */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 2rem;
        }

        /* Panah dropdown */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 2rem;
            right: 0.5rem;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            outline: none;
            box-shadow: 0 0 0 2px rgba(251, 207, 232, 0.5);
            /* focus:ring-pink-200 */
            border-color: #fbcfe8;
            /* focus:border-pink-200 */
        }

        img {
            width: 100%;
            height: 300px;
            object-fit: contain;
        }
    </style>
</head>