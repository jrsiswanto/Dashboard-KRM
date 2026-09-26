@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')

    {{-- ========================================================= --}}
    {{-- HEADER HALAMAN --}}
    {{-- ========================================================= --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-on-surface">
                Manajemen Pengguna
            </h1>
            <p class="mt-1 text-sm text-on-surface-variant">
                Kelola hak akses dan peran staf internal Kebun Raya Mangrove Surabaya.
            </p>
        </div>

        <button type="button" onclick="openCreateModal()" class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-on-primary shadow-sm transition-colors hover:bg-primary-container">
            <span class="material-symbols-outlined text-[18px]">person_add</span>
            Tambah Pengguna
        </button>
    </div>

    {{-- ========================================================= --}}
    {{-- NOTIFIKASI SUKSES --}}
    {{-- ========================================================= --}}
    @if (session('success'))
        <div class="mb-8 flex items-center justify-between rounded-xl bg-primary/10 p-4 text-primary">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- ========================================================= --}}
    {{-- INFO CARD / PANDUAN PERAN --}}
    {{-- ========================================================= --}}
    <div class="relative mb-8 overflow-hidden rounded-xl border border-outline-variant bg-surface-container p-6 shadow-sm">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-primary"></div>
        <div class="flex items-start gap-4">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                <span class="material-symbols-outlined text-[20px]">admin_panel_settings</span>
            </div>
            <div class="flex flex-col gap-1">
                <h3 class="text-base font-semibold text-on-surface">Panduan Peran Pengguna</h3>
                <p class="text-sm leading-relaxed text-on-surface-variant">
                    <strong class="font-medium text-on-surface">Super Admin</strong> memiliki akses penuh ke seluruh modul sistem, termasuk pengaturan sistem dan log audit. 
                    <strong class="font-medium text-on-surface">Operator Field</strong> memiliki akses baca/tulis pada modul Program KRM, Dokumentasi, dan Pelaporan CSR sesuai area tugas spesifik.
                </p>
            </div>
        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- CONTROLS BAR (PENCARIAN & FILTER) --}}
    {{-- ========================================================= --}}
    <form method="GET" action="{{ route('manajemen') }}" class="mb-6 flex flex-wrap items-center justify-between gap-4 rounded-xl border border-outline-variant bg-surface-container p-4 shadow-sm">
        <div class="flex w-full flex-wrap items-center gap-3 lg:w-auto">
            
            {{-- Search Input --}}
            <div class="relative w-full sm:w-[280px]">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">search</span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="w-full rounded-lg border border-outline-variant bg-surface-container-low py-2.5 pl-10 pr-4 text-sm text-on-surface placeholder:text-on-surface-variant/60 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>

            {{-- Filter Role --}}
            <div class="relative min-w-[160px]">
                <select name="role" onchange="this.form.submit()" class="w-full cursor-pointer appearance-none rounded-lg border border-outline-variant bg-surface-container-low py-2.5 pl-4 pr-10 text-sm text-on-surface focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/25">
                    <option value="">Semua Peran</option>
                    <option value="super-admin" {{ request('role') == 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="operator-field" {{ request('role') == 'operator-field' ? 'selected' : '' }}>Operator Field</option>
                </select>
                <span class="material-symbols-outlined pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">expand_more</span>
            </div>

            {{-- Filter Status --}}
            <div class="relative min-w-[150px]">
                <select name="status" onchange="this.form.submit()" class="w-full cursor-pointer appearance-none rounded-lg border border-outline-variant bg-surface-container-low py-2.5 pl-4 pr-10 text-sm text-on-surface focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <option value="">Semua Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <span class="material-symbols-outlined pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">expand_more</span>
            </div>

        </div>

        {{-- Total Counter --}}
        <div class="inline-flex items-center gap-2 rounded-lg bg-surface-container-low px-3 py-2 text-xs font-medium text-on-surface-variant">
            <span class="material-symbols-outlined text-[16px]">group</span>
            Total: {{ $totalUsers }} Pengguna
        </div>
    </form>


    {{-- ========================================================= --}}
    {{-- TABEL PENGGUNA --}}
    {{-- ========================================================= --}}
    <div class="overflow-hidden rounded-xl border border-outline-variant bg-surface-container shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] border-collapse text-left">
                <thead class="border-b border-outline-variant bg-surface-container-low/50 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                    <tr>
                        <th class="px-6 py-3.5">Pengguna</th>
                        <th class="px-6 py-3.5">Peran</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5">Terakhir Aktif</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/50 text-sm text-on-surface">
                    
                    @forelse ($users as $user)
                        @php
                            // Generate Inisial (Max 2 huruf dari nama)
                            $words = explode(' ',$user->name);
                            $initials = strtoupper(substr($words[0], 0, 1)) . (isset($words[1]) ? strtoupper(substr($words[1], 0, 1)) : '');
                            
                            // Kondisi Style
                            $isAktif = strtolower($user->status) === 'aktif';
                            $rowClass =$isAktif ? 'hover:bg-surface-container-low' : 'opacity-75 hover:bg-surface-container-low';
                            $iconColor =$user->role === 'super-admin' ? 'text-primary' : 'text-secondary';
                            $iconBg =$user->role === 'super-admin' ? 'bg-primary/10' : 'bg-secondary/10';
                            
                            if (!$isAktif) {
                                $iconColor = 'text-on-surface-variant';$iconBg = 'bg-surface-variant grayscale';
                            }
                        @endphp

                        <tr class="group transition-colors {{ $rowClass }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full font-semibold {{ $iconColor }} {{$iconBg }}">
                                        {{ $initials }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-medium transition-colors {{ $isAktif ? 'text-on-surface group-hover:text-primary' : 'text-on-surface-variant' }}">
                                            {{ $user->name }}
                                        </p>
                                        <p class="truncate text-xs text-on-surface-variant">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="inline-flex items-center gap-1.5 font-medium {{ $isAktif ? 'text-on-surface' : 'text-on-surface-variant' }}">
                                    @if($user->role === 'super-admin')
                                        <span class="material-symbols-outlined text-[16px] {{ $isAktif ? 'text-primary' : '' }}">admin_panel_settings</span>
                                        Super Admin
                                    @else
                                        <span class="material-symbols-outlined text-[16px] {{ $isAktif ? 'text-secondary' : '' }}">forest</span>
                                        Operator Field
                                    @endif
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                @if($isAktif)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-semibold uppercase text-primary">
                                        <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-surface-variant px-2.5 py-0.5 text-xs font-semibold uppercase text-on-surface-variant">
                                        <span class="h-1.5 w-1.5 rounded-full bg-on-surface-variant"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4 text-xs text-on-surface-variant">
                                {{ $user->last_active ?? 'Belum pernah login' }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    {{-- TOMBOL EDIT --}}
                                    <button type="button" 
                                        onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ $user->role }}', '{{ strtolower($user->status) }}')"
                                        class="rounded-lg p-1.5 text-secondary hover:bg-secondary/10 transition-colors" title="Edit">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>

                                    {{-- TOMBOL HAPUS --}}
                                    <button type="button" 
                                        onclick="openDeleteModal({{ $user->id }})"
                                        class="rounded-lg p-1.5 text-error hover:bg-error-container/20 transition-colors" title="Hapus">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-sm text-on-surface-variant">
                                Belum ada data pengguna yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION DINAMIS --}}
        @if($users->hasPages())
            <div class="border-t border-outline-variant bg-surface-container-low px-6 py-3.5">
                {{ $users->links() }}
            </div>
        @endif

    </div>

    {{-- ==================== MODAL TAMBAH PENGGUNA ==================== --}}
    <dialog id="createModal" class="m-auto w-full max-w-lg border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Tambah Pengguna</h3>
                <button type="button" onclick="closeCreateModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ url('/admin/manajemen') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Masukkan nama pengguna"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Email</label>
                    <input type="email" name="email" required placeholder="email@contoh.com"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Password</label>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Peran</label>
                        <select name="role" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="operator-field">Operator Field</option>
                            <option value="super-admin">Super Admin</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status</label>
                        <select name="status" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex justify-end gap-2 border-t border-outline-variant pt-4">
                    <button type="button" onclick="closeCreateModal()"
                            class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container shadow-sm">
                        Simpan Data
                    </button>
                </div>
            </form>

        </div>
    </dialog>

    {{-- ==================== MODAL EDIT PENGGUNA ==================== --}}
    <dialog id="editModal" class="m-auto w-full max-w-lg border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Edit Pengguna</h3>
                <button type="button" onclick="closeEditModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="editForm" action="" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Lengkap</label>
                    <input type="text" id="edit_name" name="name" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Email</label>
                    <input type="email" id="edit_email" name="email" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Password <span class="text-on-surface-variant/70 normal-case">(Opsional - Kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password" placeholder="Masukkan password baru..."
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Peran</label>
                        <select id="edit_role" name="role" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="operator-field">Operator Field</option>
                            <option value="super-admin">Super Admin</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status</label>
                        <select id="edit_status" name="status" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex justify-end gap-2 border-t border-outline-variant pt-4">
                    <button type="button" onclick="closeEditModal()"
                            class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container shadow-sm">
                        Perbarui Data
                    </button>
                </div>
            </form>

        </div>
    </dialog>

    {{-- ==================== MODAL KONFIRMASI HAPUS ==================== --}}
    <dialog id="deleteModal" class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="flex flex-col items-center gap-2 text-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-on-error-container">
                    <span class="material-symbols-outlined text-[24px]">warning</span>
                </div>

                <h3 class="text-lg font-semibold text-on-surface">Konfirmasi Hapus</h3>
                <p class="text-xs text-on-surface-variant">Apakah Anda yakin ingin menghapus data pengguna ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>

            <form id="deleteForm" action="" method="POST" class="mt-6 flex justify-center gap-2">
                @csrf
                @method('DELETE')

                <button type="button" onclick="closeDeleteModal()"
                        class="w-full rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                    Batal
                </button>
                <button type="submit"
                        class="w-full rounded-xl bg-error-container px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-error-container transition-colors hover:opacity-80">
                    Hapus
                </button>
            </form>

        </div>
    </dialog>

@endsection

@push('scripts')
<script>
    const baseUrl = "{{ url('/admin/manajemen') }}";

    // --- MODAL TAMBAH ---
    function openCreateModal() {
        document.getElementById('createModal').showModal();
    }
    function closeCreateModal() {
        document.getElementById('createModal').close();
    }

    // --- MODAL EDIT ---
    function openEditModal(id, name, email, role, status) {
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_role').value = role;
        document.getElementById('edit_status').value = status;

        document.getElementById('editForm').action = `${baseUrl}/${id}`;
        document.getElementById('editModal').showModal();
    }
    function closeEditModal() {
        document.getElementById('editModal').close();
    }

    // --- MODAL HAPUS ---
    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `${baseUrl}/${id}`;
        document.getElementById('deleteModal').showModal();
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').close();
    }
</script>
@endpush