<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - KRM Surabaya</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tertiary: "#373a3b",
                        "tertiary-fixed": "#e1e3e4",
                        "surface-container-lowest": "#ffffff",
                        "on-error": "#ffffff",
                        "surface-container": "#f0eded",
                        "on-secondary-container": "#626262",
                        "on-error-container": "#93000a",
                        "secondary-container": "#e1dfdf",
                        primary: "#004328",
                        "primary-container": "#0d5c3a",
                        "on-surface-variant": "#404942",
                        error: "#ba1a1a",
                        "error-container": "#ffdad6",
                        secondary: "#5e5e5e",
                        "on-primary": "#ffffff",
                        "primary-fixed-dim": "#8ed6aa",
                        "surface": "#fcf9f8",
                        "on-surface": "#1c1b1b",
                        "primary-fixed": "#a9f3c5",
                        "surface-tint": "#226b47",
                        "inverse-on-surface": "#f3f0ef",
                        "secondary-fixed": "#e4e2e2",
                        background: "#fcf9f8",
                        "inverse-primary": "#8ed6aa",
                        "on-tertiary": "#ffffff",
                        "on-primary-fixed-variant": "#005232",
                        "surface-container-low": "#f6f3f2",
                        "on-primary-fixed": "#002111",
                        "outline-variant": "#bfc9c0",
                        "inverse-surface": "#313030",
                        "on-tertiary-container": "#c2c3c5",
                        "surface-bright": "#fcf9f8",
                        "on-tertiary-fixed-variant": "#454748",
                        "on-secondary": "#ffffff",
                        "surface-container-high": "#eae7e7",
                        "on-tertiary-fixed": "#191c1d",
                        "surface-variant": "#e5e2e1",
                        "surface-container-highest": "#e5e2e1",
                        "tertiary-fixed-dim": "#c5c7c8",
                        outline: "#707971",
                        "on-primary-container": "#8ad2a7",
                        "tertiary-container": "#4e5152",
                        "secondary-fixed-dim": "#c7c6c6",
                        "surface-dim": "#dcd9d9",
                        "on-secondary-fixed": "#1b1c1c",
                        "on-secondary-fixed-variant": "#464747",
                    },

                    borderRadius: {
                        DEFAULT: "0.125rem",
                        lg: "0.25rem",
                        xl: "0.5rem",
                        full: "0.75rem"
                    },

                    spacing: {
                        "unit-xs": "4px",
                        "margin-page": "32px",
                        "unit-sm": "8px",
                        "sidebar-width": "260px",
                        "unit-xl": "48px",
                        gutter: "24px",
                        "unit-md": "16px",
                        "unit-lg": "24px"
                    }
                }
            }
        }
    </script>

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >
</head>

<body class="bg-surface font-body-md text-on-surface">

<main class="w-full flex items-center justify-center min-h-screen">

    <div class="flex flex-col w-full h-full min-h-screen">

        <div class="flex flex-1 w-full relative bg-surface">

            {{-- ================= LEFT SIDE ================= --}}
            <div class="hidden lg:flex w-1/2 relative bg-primary items-center justify-center overflow-hidden">

                <div
                    class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBPGwwzhM03H7WgGKjWpM9fZoAZs-Yl_X73lklfMzfr2c8RL0W9s6hmYooFlk1ltrd0uYKJyZPJz1BYnoojeWtE6EXqtv3NjaWdECq4cccOOIsHHABGz_yHqG4ypXxeNdiJYvEyomfaisZ0dhWue2LC3HDKlx5Tka0KJPPog2thy__PJoYhfOaVQ0X-MCOUqPO8TY5O8Ue1vPtPp9DYBK3rB5tbVHfMDgpi0MEwMikOLREwwhBeV6GmA')">
                </div>

                <div class="absolute inset-0 bg-gradient-to-tr from-primary/80 to-transparent mix-blend-multiply">
                </div>

                <div class="relative z-10 p-16 max-w-lg">

                    {{-- Logo --}}
                    <div class="w-16 h-16 bg-surface-container-lowest rounded-xl flex items-center justify-center mb-8 shadow-xl">
                        <span
                            class="material-symbols-outlined text-primary text-4xl"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            eco
                        </span>
                    </div>

                    {{-- Title --}}
                    <h1 class="text-4xl font-bold text-on-primary mb-4">
                        Kebun Raya Mangrove Surabaya
                    </h1>

                    {{-- Description --}}
                    <p class="text-lg text-primary-fixed">
                        Sistem Informasi Pengelolaan, Pemantauan, dan Administrasi
                        Konservasi Ekosistem Mangrove.
                    </p>

                    {{-- Authorized --}}
                    <div class="mt-16 flex gap-4">

                        <div class="flex items-center gap-3 bg-surface-container-lowest/10 backdrop-blur px-4 py-2 rounded-lg">

                            <span class="material-symbols-outlined text-on-primary">
                                verified_user
                            </span>

                            <span class="text-sm text-on-primary uppercase tracking-wider">
                                Akses Terotorisasi
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= RIGHT SIDE ================= --}}
            <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-16 lg:p-24 relative bg-surface">

                {{-- Background Decoration --}}
                <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                </div>

                <div class="absolute bottom-0 left-0 w-64 h-64 bg-tertiary/5 rounded-full blur-2xl translate-y-1/2 -translate-x-1/2">
                </div>


                <div class="w-full max-w-md relative z-10">

                    {{-- Mobile Logo --}}
                    <div class="lg:hidden w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-8 shadow-md">

                        <span
                            class="material-symbols-outlined text-on-primary text-2xl"
                            style="font-variation-settings: 'FILL' 1;"
                        >
                            eco
                        </span>

                    </div>


                    {{-- Header --}}
                    <div class="mb-10">

                        <h2 class="text-3xl font-bold text-on-surface mb-2 tracking-tight">
                            Masuk ke KRM Surabaya
                        </h2>

                        <p class="text-base text-on-surface-variant">
                            Portal Pengelolaan dan Monitoring Konservasi Mangrove
                        </p>

                    </div>


                    {{-- ================= ERROR MESSAGE ================= --}}

                    @if(session('error'))

                        <div class="mb-6 p-4 bg-error-container rounded-lg flex gap-3 shadow-sm border border-error/20">

                            <span class="material-symbols-outlined text-on-error-container shrink-0 mt-0.5">
                                error
                            </span>

                            <p class="text-base text-on-error-container">
                                {{ session('error') }}
                            </p>

                        </div>

                    @endif


                    {{-- Validation Error --}}
                    @if($errors->any())

                        <div class="mb-6 p-4 bg-error-container rounded-lg border border-error/20">

                            <div class="flex gap-3">

                                <span class="material-symbols-outlined text-on-error-container">
                                    error
                                </span>

                                <div>

                                    <p class="font-semibold text-on-error-container mb-1">
                                        Terjadi kesalahan:
                                    </p>

                                    <ul class="list-disc list-inside text-sm text-on-error-container">

                                        @foreach($errors->all() as $error)

                                            <li>{{ $error }}</li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- ================= LOGIN FORM ================= --}}

                    <form
                        action="{{ route('login') }}"
                        method="POST"
                        class="space-y-6"
                    >

                        @csrf


                        {{-- Username --}}
                        <div class="space-y-2">

                            <label
                                for="username"
                                class="block text-sm text-on-surface uppercase tracking-wider"
                            >
                                Username atau Email
                            </label>

                            <div class="relative">

                                <input
                                    id="username"
                                    name="username"
                                    type="text"
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username admin"
                                    autocomplete="username"
                                    required
                                    class="w-full h-11 px-4 pr-12 bg-surface-container-lowest border
                                    @error('username')
                                        border-error focus:ring-error
                                    @else
                                        border-outline-variant focus:ring-primary
                                    @enderror
                                    rounded-lg text-base text-on-surface
                                    focus:outline-none focus:ring-2 focus:border-transparent
                                    transition-shadow"
                                >

                                @error('username')

                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">

                                        <span class="material-symbols-outlined text-error text-xl">
                                            warning
                                        </span>

                                    </div>

                                @enderror

                            </div>

                        </div>


                        {{-- Password --}}
                        <div class="space-y-2">

                            <div class="flex justify-between items-center">

                                <label
                                    for="password"
                                    class="block text-sm text-on-surface uppercase tracking-wider"
                                >
                                    Password
                                </label>

                                <a
                                  
                                    class="text-sm text-primary hover:text-primary-container transition-colors"
                                >
                                    Lupa Password?
                                </a>

                            </div>


                            <div class="relative">

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="••••••••"
                                    autocomplete="current-password"
                                    required
                                    class="w-full h-11 px-4 pr-12 bg-surface-container-lowest border
                                    @error('password')
                                        border-error focus:ring-error
                                    @else
                                        border-outline-variant focus:ring-primary
                                    @enderror
                                    rounded-lg text-base text-on-surface
                                    focus:outline-none focus:ring-2 focus:border-transparent
                                    transition-shadow"
                                >


                                {{-- Show Password --}}
                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-2 top-1/2 -translate-y-1/2
                                    w-8 h-8 flex items-center justify-center
                                    text-on-surface-variant hover:text-on-surface
                                    focus:outline-none rounded-md"
                                >

                                    <span
                                        id="password-icon"
                                        class="material-symbols-outlined text-xl"
                                    >
                                        visibility
                                    </span>

                                </button>

                            </div>

                        </div>


                        {{-- Remember Me --}}
                        <div class="flex items-center">

                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                value="1"
                                class="w-4 h-4 rounded border-outline text-primary
                                focus:ring-primary focus:ring-2
                                bg-surface-container-lowest accent-primary"
                            >

                            <label
                                for="remember"
                                class="ml-2 text-base text-on-surface-variant cursor-pointer"
                            >
                                Ingat saya di perangkat ini
                            </label>

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="w-full h-11 bg-primary hover:bg-primary-container
                            active:bg-[#094028] text-on-primary
                            font-semibold uppercase tracking-wider
                            rounded-lg shadow-md hover:shadow-lg
                            transition-all flex items-center justify-center gap-2"
                        >

                            <span>Masuk</span>

                            <span class="material-symbols-outlined text-lg">
                                login
                            </span>

                        </button>

                    </form>


                    {{-- Security Information --}}
                    <div class="mt-12 flex items-center justify-center gap-2
                    p-4 bg-surface-container-low rounded-lg
                    border border-surface-variant shadow-sm">

                        <span class="material-symbols-outlined text-secondary text-lg">
                            lock
                        </span>

                        <p class="text-secondary text-center text-xs">
                            Halaman ini dilindungi oleh sistem keamanan dan enkripsi
                            data KRM.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>


{{-- ================= JAVASCRIPT ================= --}}

<script>

    function togglePassword() {

        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('password-icon');

        if (passwordInput.type === 'password') {

            passwordInput.type = 'text';
            passwordIcon.textContent = 'visibility_off';

        } else {

            passwordInput.type = 'password';
            passwordIcon.textContent = 'visibility';

        }

    }

</script>

</body>
</html>