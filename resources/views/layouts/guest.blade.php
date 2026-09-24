<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KRM Surabaya') }}</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Theme Styles -->
    <style>
        :root {
            --primary: #004d35;
            --primary-container: #0b6447;
            --primary-fixed: #a9f3c5;
            --primary-fixed-dim: #8ed6aa;

            --surface: #fcf9f8;
            --surface-container-low: #f5f2f1;
            --surface-container: #eeeceb;
            --surface-container-high: #e8e5e4;
            --surface-container-highest: #e1dfde;
            --surface-container-lowest: #ffffff;

            --on-primary: #ffffff;
            --on-surface: #1c1b1b;
            --on-surface-variant: #444846;

            --secondary: #626461;
            --tertiary: #414442;

            --error: #ba1a1a;
            --error-container: #ffdad6;
            --on-error-container: #93000a;

            --outline: #747875;
            --outline-variant: #c3c8c4;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 0;
            background: var(--surface);
            color: var(--on-surface);
            font-family: 'Inter', sans-serif;
            height: 100%;
            overflow: hidden; /* Mencegah scroll di body */
        }

        button, input { font-family: inherit; }

        .bg-primary { background-color: var(--primary) !important; }
        .bg-primary-container { background-color: var(--primary-container) !important; }
        .bg-surface { background-color: var(--surface) !important; }
        .bg-surface-container-low { background-color: var(--surface-container-low) !important; }
        .text-primary { color: var(--primary) !important; }
        .text-primary-fixed { color: var(--primary-fixed) !important; }
        .text-on-surface { color: var(--on-surface) !important; }
        .text-on-surface-variant { color: var(--on-surface-variant) !important; }
        .text-secondary { color: var(--secondary) !important; }
        .bg-error-container { background-color: var(--error-container) !important; }
        .text-on-error-container { color: var(--on-error-container) !important; }
        .border-outline-variant { border-color: var(--outline-variant) !important; }
        .bg-primary\/5 { background-color: rgb(0 77 53 / 0.05) !important; }
        .bg-tertiary\/5 { background-color: rgb(65 68 66 / 0.05) !important; }
    </style>
</head>

<body>
    <!-- Pembungkus Utama -->
    <main class="h-screen w-full flex flex-col lg:flex-row overflow-hidden">
        
        <!-- BAGIAN KIRI (GAMBAR & TEXT) -->
        <section class="hidden lg:flex lg:w-1/2 relative h-full overflow-hidden bg-primary items-center justify-center">
            <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBPGwwzhM03H7WgGKjWpM9fZoAZs-Yl_X73lklfMzfr2c8RL0W9s6hmYooFlk1ltrd0uYKJyZPJz1BYnoojeWtE6EXqtv3njaWdECq4cccOOIsHHABGz_yHqG4ypXxeNdiJYvEyomfaisZ0dhWue2LC3HDKlx5Tka0KJPPog2thy__PJoYhfOaVQ0X-MCOUqPO8TY5O8Ue1vPtPp9DYBK3rB5tbVHfMDgpi0MEwMikOLREwwhBeV6GmA');"></div>
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/90 via-primary/60 to-transparent"></div>

            <div class="relative z-10 max-w-lg px-16">
                <div class="w-16 h-16 mb-8 bg-white rounded-xl flex items-center justify-center shadow-xl">
                    <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                </div>
                <h1 class="text-4xl xl:text-5xl font-bold leading-tight text-white mb-5">
                    Kebun Raya Mangrove Surabaya
                </h1>
                <p class="text-lg leading-relaxed text-primary-fixed">
                    Sistem Informasi Pengelolaan, Pemantauan, dan Administrasi Konservasi Ekosistem Mangrove.
                </p>
            </div>
        </section>


        <!-- BAGIAN KANAN (FORM & DEKORASI) -->
        <section class="w-full lg:w-1/2 h-full relative bg-surface">
            
            <!-- PERBAIKAN 1: Dekorasi dibungkus div terpisah dengan overflow-hidden -->
            <!-- Ini mencegah lingkaran blur membuat halaman seolah-olah kepanjangan -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-tertiary/5 rounded-full blur-2xl translate-y-1/2 -translate-x-1/2"></div>
            </div>

            <!-- PERBAIKAN 2: Form Wrapper. Area ini AKAN SCROLL hanya jika isi {slot} lebih panjang dari layar -->
            <div class="relative z-10 w-full h-full overflow-y-auto overflow-x-hidden flex items-center justify-center px-6 py-12 sm:px-12 lg:px-20 xl:px-24">
                <div class="w-full max-w-md">
                    
                    <!-- Logo Mobile -->
                    <div class="lg:hidden w-12 h-12 mb-8 bg-primary rounded-xl flex items-center justify-center shadow-md">
                        <span class="material-symbols-outlined text-white text-2xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                    </div>

                    <!-- ISI KONTEN (LOGIN / REGISTER) MASUK KE SINI -->
                    {{ $slot }}

                </div>
            </div>

        </section>

    </main>
</body>
</html>