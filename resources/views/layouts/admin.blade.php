<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') - KRM Surabaya
    </title>

    {{-- Inter Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
        rel="stylesheet"
    >

    {{-- Material Symbols --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#004328',
                        'primary-container': '#0d5c3a',
                        'on-primary': '#ffffff',

                        surface: '#fcf9f8',
                        'surface-container-low': '#f6f3f2',
                        'surface-container': '#f0eded',
                        'surface-container-high': '#eae7e7',
                        'surface-container-highest': '#e5e2e1',

                        'on-surface': '#1c1b1b',
                        'on-surface-variant': '#404942',

                        outline: '#707971',
                        'outline-variant': '#bfc9c0',

                        error: '#ba1a1a',
                        'error-container': '#ffdad6',

                        secondary: '#5e5e5e',
                        tertiary: '#373a3b',
                    },

                    spacing: {
                        'sidebar-width': '260px',
                        'unit-xs': '4px',
                        'unit-sm': '8px',
                        'unit-md': '16px',
                        'unit-lg': '24px',
                        'unit-xl': '48px',
                        'margin-page': '32px',
                    },

                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            overscroll-behavior: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-surface font-inter text-on-surface">

    {{-- ========================================================= --}}
    {{-- SIDEBAR ADMIN --}}
    {{-- ========================================================= --}}

    <aside
        class="fixed left-0 top-0 z-50 flex h-full w-[260px] flex-col border-r border-outline-variant bg-surface-container-low"
    >

        {{-- LOGO / BRAND --}}
        <div class="px-unit-lg py-unit-xl">

            <div class="flex items-center gap-unit-md">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary"
                >
                    <span class="material-symbols-outlined text-on-primary">
                        forest
                    </span>
                </div>

                <div>
                    <div class="text-xl font-semibold leading-tight text-primary">
                        KRM Surabaya
                    </div>

                    <div class="text-xs font-medium tracking-wide text-on-surface-variant">
                        Admin Portal
                    </div>
                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- NAVIGATION --}}
        {{-- ===================================================== --}}

        <nav class="flex-1 overflow-y-auto px-unit-md">

            {{-- OVERVIEW --}}
            <div class="mb-unit-lg">

                <p
                    class="mb-unit-sm px-unit-md text-xs font-medium uppercase tracking-widest text-on-surface-variant"
                >
                    Overview
                </p>

                {{-- Dashboard --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="
                        mb-1 flex items-center gap-unit-md
                        rounded-xl px-unit-md py-unit-sm
                        transition-all
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-primary text-on-primary'
                            : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                        }}
                    "
                >

                    <span class="material-symbols-outlined">
                        dashboard
                    </span>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>

            </div>


            {{-- PENGELOLAAN KRM --}}
            <div class="mb-unit-lg">

                <p
                    class="mb-unit-sm px-unit-md text-xs font-medium uppercase tracking-widest text-on-surface-variant"
                >
                    Pengelolaan KRM
                </p>


                {{-- Program KRM --}}
                <a
                    href="{{ route('tambah-program') }}"
                    class="
                        mb-1 flex items-center gap-unit-md
                        rounded-xl px-unit-md py-unit-sm
                        transition-all
                        {{ request()->routeIs('admin.program.*')
                            ? 'bg-primary text-on-primary'
                            : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                        }}
                    "
                >

                    <span class="material-symbols-outlined">
                        park
                    </span>

                    <span class="text-sm">
                        Program KRM
                    </span>

                </a>


                {{-- Dokumentasi --}}
                <a
                    href="{{ route('dokumentasi') }}"
                    class="
                        mb-1 flex items-center gap-unit-md
                        rounded-xl px-unit-md py-unit-sm
                        transition-all
                        {{ request()->routeIs('admin.dokumentasi.*')
                            ? 'bg-primary text-on-primary'
                            : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                        }}
                    "
                >

                    <span class="material-symbols-outlined">
                        image
                    </span>

                    <span class="text-sm">
                        Dokumentasi
                    </span>

                </a>

            </div>


            {{-- KEMITRAAN --}}
            <div class="mb-unit-lg">

                <p
                    class="mb-unit-sm px-unit-md text-xs font-medium uppercase tracking-widest text-on-surface-variant"
                >
                    Kemitraan
                </p>


                {{-- Pelaporan CSR --}}
                <a
                    href="#"
                    class="
                        mb-1 flex items-center gap-unit-md
                        rounded-xl px-unit-md py-unit-sm
                        transition-all
                        {{ request()->routeIs('admin.csr.*')
                            ? 'bg-primary text-on-primary'
                            : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                        }}
                    "
                >

                    <span class="material-symbols-outlined">
                        handshake
                    </span>

                    <span class="text-sm">
                        Pelaporan CSR
                    </span>

                </a>

            </div>


            {{-- ADMINISTRASI --}}
            <div class="mb-unit-lg">

                <p
                    class="mb-unit-sm px-unit-md text-xs font-medium uppercase tracking-widest text-on-surface-variant"
                >
                    Administrasi
                </p>


                {{-- Manajemen Pengguna --}}
                <a
                    href="#"
                    class="
                        mb-1 flex items-center gap-unit-md
                        rounded-xl px-unit-md py-unit-sm
                        transition-all
                        {{ request()->routeIs('admin.users.*')
                            ? 'bg-primary text-on-primary'
                            : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                        }}
                    "
                >

                    <span class="material-symbols-outlined">
                        group
                    </span>

                    <span class="text-sm">
                        Manajemen Pengguna
                    </span>

                </a>

            </div>

        </nav>


        {{-- ===================================================== --}}
        {{-- PROFILE ADMIN --}}
        {{-- ===================================================== --}}

        <div
            class="mt-auto border-t border-outline-variant bg-surface-container-low p-unit-md"
        >

            <div class="mb-unit-md flex items-center gap-unit-md">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-primary"
                >
                    <span class="material-symbols-outlined text-[20px] text-on-primary">
                        person
                    </span>
                </div>

                <div class="min-w-0 flex-1">

                    <p class="truncate text-sm font-bold text-on-surface">
                        {{ auth()->user()->name ?? 'Andi Pratama' }}
                    </p>

                    <p class="text-xs text-on-surface-variant">
                        Admin
                    </p>

                </div>

            </div>


            {{-- Logout --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="
                        flex w-full items-center justify-center
                        gap-unit-sm rounded-lg
                        border border-outline
                        py-unit-sm
                        text-sm text-on-surface
                        transition-colors
                        hover:bg-surface-container-high
                    "
                >

                    <span class="material-symbols-outlined text-[18px]">
                        logout
                    </span>

                    Keluar

                </button>

            </form>

        </div>

    </aside>



    {{-- ========================================================= --}}
    {{-- MAIN AREA --}}
    {{-- ========================================================= --}}

    <div class="pl-[260px]">


        {{-- ===================================================== --}}
        {{-- TOP HEADER --}}
        {{-- ===================================================== --}}

        <header
            class="
                fixed left-[260px] right-0 top-0 z-40
                flex h-16 items-center justify-between
                border-b border-outline-variant
                bg-surface/80 px-margin-page
                backdrop-blur-xl
            "
        >

            {{-- SEARCH --}}
            <div class="flex items-center gap-unit-lg">

                <div
                    class="
                        relative flex w-[400px]
                        items-center rounded-full
                        border border-outline-variant
                        bg-surface-container-low
                        px-unit-md
                    "
                >

                    <span class="material-symbols-outlined mr-unit-sm text-on-surface-variant">
                        search
                    </span>

                    <input
                        type="text"
                        placeholder="Search records..."
                        class="
                            w-full
                            border-none
                            bg-transparent
                            py-2
                            text-sm
                            focus:outline-none
                            focus:ring-0
                        "
                    >

                </div>

            </div>


            {{-- HEADER RIGHT --}}
            <div class="flex items-center gap-unit-lg">

                {{-- Notification --}}
                <button
                    type="button"
                    class="
                        relative rounded-full
                        p-unit-sm
                        text-on-surface-variant
                        hover:bg-surface-container-high
                    "
                >

                    <span class="material-symbols-outlined">
                        notifications
                    </span>

                    <span
                        class="
                            absolute right-2 top-2
                            h-2 w-2
                            rounded-full
                            bg-error
                        "
                    ></span>

                </button>


                {{-- Profile --}}
                <div
                    class="
                        flex h-8 w-8
                        items-center justify-center
                        rounded-full bg-primary
                    "
                >

                    <span class="material-symbols-outlined text-[18px] text-on-primary">
                        person
                    </span>

                </div>

            </div>

        </header>



        {{-- ===================================================== --}}
        {{-- PAGE CONTENT --}}
        {{-- ===================================================== --}}

        <main class="min-h-screen bg-surface pt-16">

            <div
                class="
                    flex w-full flex-col
                    px-margin-page
                    py-unit-xl
                "
            >

                @yield('content')

            </div>

        </main>

    </div>


    @stack('scripts')

</body>

</html>