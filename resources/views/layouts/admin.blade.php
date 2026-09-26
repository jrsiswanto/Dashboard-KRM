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

            {{-- OVERVIEW (Satu-satunya Header) --}}
            <p class="mb-unit-sm mt-4 px-unit-md text-xs font-medium uppercase tracking-widest text-on-surface-variant">
                Overview
            </p>

            <div class="flex flex-col gap-1 mb-unit-lg">
                
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-unit-md rounded-xl px-unit-md py-unit-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm">Dashboard</span>
                </a>

                {{-- Program KRM --}}
                <a href="{{ route('tambah-program') }}" class="flex items-center gap-unit-md rounded-xl px-unit-md py-unit-sm transition-all {{ request()->routeIs('tambah-program') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                    <span class="material-symbols-outlined">park</span>
                    <span class="text-sm">Program KRM</span>
                </a>

                {{-- Activity (Menu Baru) --}}
                <a href="{{ route('activity.index', ['create' => 'true']) }}" class="flex items-center gap-unit-md rounded-xl px-unit-md py-unit-sm transition-all {{ request()->routeIs('activity.*') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                    <span class="material-symbols-outlined">local_activity</span>
                    <span class="text-sm">Activity</span>
                </a>

                {{-- Pelaporan CSR --}}
                <a href="{{ route('admin.csr') }}" class="flex items-center gap-unit-md rounded-xl px-unit-md py-unit-sm transition-all {{ request()->routeIs('admin-csr') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                    <span class="material-symbols-outlined">handshake</span>
                    <span class="text-sm">Pelaporan CSR</span>
                </a>

                {{-- Manajemen Pengguna --}}
                <a href="{{ route('manajemen') }}" class="flex items-center gap-unit-md rounded-xl px-unit-md py-unit-sm transition-all {{ request()->routeIs('manajemen') ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm">Manajemen Pengguna</span>
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
                    {{-- Profile --}}
<button 
    type="button" 
    onclick="openProfileModal()"
    title="Edit Profil"
    class="flex h-8 w-8 items-center justify-center rounded-full bg-primary transition-colors hover:bg-primary-container focus:outline-none focus:ring-2 focus:ring-primary/50"
>
    <span class="material-symbols-outlined text-[18px] text-on-primary hover:text-primary">
        person
    </span>
</button>
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
        {{-- PAGE CONTENT --}}
        {{-- ===================================================== --}}

        <main class="min-h-screen bg-surface ">

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

{{-- ==================== MODAL EDIT PROFIL (GLOBAL) ==================== --}}
@auth
<dialog id="profileModal" class="m-auto w-full max-w-lg border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
    <div class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

        <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
            <h3 class="text-xl font-semibold text-on-surface">Edit Profil Saya</h3>
            <button type="button" onclick="closeProfileModal()" class="text-on-surface-variant hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        {{-- Pastikan Anda membuat route ini nanti di web.php --}}
        <form action="{{ url('/admin/profile/' . auth()->id()) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Lengkap</label>
                <input type="text" name="name" required value="{{ auth()->user()->name }}"
                       class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Email</label>
                <input type="email" name="email" required value="{{ auth()->user()->email }}"
                       class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Password <span class="text-on-surface-variant/70 normal-case">(Opsional - Kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password" placeholder="Masukkan password baru..."
                       class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
            </div>

            <div class="grid grid-cols-2 gap-4 opacity-70">
                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Peran (Read-only)</label>
                    <input type="text" disabled value="{{ auth()->user()->role === 'super-admin' ? 'Super Admin' : 'Operator Field' }}" 
                           class="w-full cursor-not-allowed rounded-xl border border-outline/20 bg-surface-variant px-4 py-2.5 text-sm text-on-surface-variant">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status (Read-only)</label>
                    <input type="text" disabled value="{{ ucfirst(auth()->user()->status) }}" 
                           class="w-full cursor-not-allowed rounded-xl border border-outline/20 bg-surface-variant px-4 py-2.5 text-sm text-on-surface-variant">
                </div>
            </div>

            <div class="mt-4 flex justify-end gap-2 border-t border-outline-variant pt-4">
                <button type="button" onclick="closeProfileModal()"
                        class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                    Batal
                </button>
                <button type="submit"
                        class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container shadow-sm">
                    Simpan Profil
                </button>
            </div>
        </form>

    </div>
</dialog>
@endauth
<script>
    // --- MODAL PROFIL (Global Layout) ---
    function openProfileModal() {
        document.getElementById('profileModal').showModal();
    }
    function closeProfileModal() {
        document.getElementById('profileModal').close();
    }
</script>
</html>