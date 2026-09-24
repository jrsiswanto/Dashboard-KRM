<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KRM Surabaya</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

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

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            background: var(--surface);
            color: var(--on-surface);
            font-family: "Inter", sans-serif;
            /* Mencegah scroll di tingkat paling luar */
            width: 100vw;
            height: 100vh;
            overflow: hidden; 
        }

        button, input { font-family: inherit; }

        .bg-primary { background-color: var(--primary) !important; }
        .bg-primary-container { background-color: var(--primary-container) !important; }
        .bg-surface { background-color: var(--surface) !important; }
        .bg-surface-container-low { background-color: var(--surface-container-low) !important; }
        .bg-surface-container { background-color: var(--surface-container) !important; }
        .bg-surface-container-high { background-color: var(--surface-container-high) !important; }
        .bg-error { background-color: var(--error) !important; }
        .bg-error-container { background-color: var(--error-container) !important; }

        .text-primary { color: var(--primary) !important; }
        .text-primary-fixed { color: var(--primary-fixed) !important; }
        .text-on-primary { color: var(--on-primary) !important; }
        .text-on-surface { color: var(--on-surface) !important; }
        .text-on-surface-variant { color: var(--on-surface-variant) !important; }
        .text-secondary { color: var(--secondary) !important; }
        .text-on-error-container { color: var(--on-error-container) !important; }

        .border-outline-variant { border-color: var(--outline-variant) !important; }

        .bg-primary\/5 { background-color: rgb(0 77 53 / 0.05) !important; }
        .bg-tertiary\/5 { background-color: rgb(65 68 66 / 0.05) !important; }
    </style>
</head>

<body>

    <!-- MAIN WRAPPER 100% LAYAR -->
    <main class="w-full h-full flex flex-col lg:flex-row">
        
        <!-- BAGIAN KIRI (GAMBAR) - Dikunci h-full -->
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
                <div class="mt-16">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-white/10 backdrop-blur-md rounded-lg">
                        <span class="material-symbols-outlined text-white">verified_user</span>
                        <span class="text-xs font-semibold uppercase tracking-wider text-white">Akses Terotorisasi</span>
                    </div>
                </div>
            </div>
        </section>

<!-- BAGIAN KANAN (FORM LOGIN) -->
        <section class="w-full lg:w-1/2 h-full relative bg-surface overflow-hidden flex items-center justify-center px-6 py-12 sm:px-12 lg:px-20 xl:px-24">
            <!-- Lingkaran Blur Dekorasi (Sekarang tidak akan tembus karena ada overflow-x-hidden) -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-tertiary/5 rounded-full blur-2xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

            <!-- Kontainer Form -->
            <div class="relative z-10 w-full max-w-md">
                <div class="lg:hidden w-12 h-12 mb-8 bg-primary rounded-xl flex items-center justify-center shadow-md">
                    <span class="material-symbols-outlined text-white text-2xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                </div>

                <div class="mb-10">
                    <h2 class="text-3xl font-bold tracking-tight text-on-surface mb-2">Masuk ke KRM Surabaya</h2>
                    <p class="text-base text-on-surface-variant">Portal Pengelolaan dan Monitoring Konservasi Mangrove</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-error-container border border-error/20 rounded-lg flex gap-3 shadow-sm">
                        <span class="material-symbols-outlined text-on-error-container shrink-0">error</span>
                        <div class="text-sm leading-relaxed text-on-error-container">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Input Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Email</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Masukkan email admin" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">person</span>
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-semibold text-primary hover:text-primary-container transition">Lupa Password?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                            
                            <button type="button" onclick="const p = document.getElementById('password'); const i = document.getElementById('passwordIcon'); if(p.type === 'password'){ p.type = 'text'; i.innerText = 'visibility_off'; } else { p.type = 'password'; i.innerText = 'visibility'; }" class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 flex items-center justify-center rounded-md text-on-surface-variant hover:text-on-surface hover:bg-gray-100 transition">
                                <span id="passwordIcon" class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="w-4 h-4 rounded border-outline accent-[#004d35] focus:ring-[#004d35]">
                        <label for="remember" class="ml-2 text-sm text-on-surface-variant cursor-pointer">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" class="w-full h-12 bg-primary hover:bg-primary-container active:scale-[0.99] text-white font-semibold text-sm uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                        <span>Masuk</span>
                        <span class="material-symbols-outlined text-lg">login</span>
                    </button>
                </form>

                <div class="mt-12 flex items-center justify-center gap-2 p-4 bg-surface-container-low border border-outline-variant rounded-lg shadow-sm">
                    <span class="material-symbols-outlined text-secondary text-lg">lock</span>
                    <p class="text-xs text-secondary text-center leading-relaxed">
                        Halaman ini dilindungi oleh sistem keamanan dan enkripsi data KRM.
                    </p>
                </div>
            </div>
        </section>

    </main>
</body>
</html>