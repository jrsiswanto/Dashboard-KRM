@extends('layouts.admin')

@section('title', 'Kelola Aktivitas')

@section('content')

    {{-- HEADER HALAMAN & TOMBOL TAMBAH --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-unit-md">
            <h1 class="text-3xl font-semibold text-on-surface">
                Kelola Aktivitas
            </h1>

            <p class="text-base text-on-surface-variant">
                Daftar seluruh aktivitas dan kegiatan Kebun Raya Mangrove Surabaya.
            </p>
        </div>

        <div>
            <button onclick="openCreateModal()"
                type="button"
                class="flex items-center gap-2 rounded-xl bg-primary px-4 py-3 text-xs font-medium uppercase tracking-widest text-on-primary shadow-sm transition-colors hover:bg-primary-container">
                <span class="material-symbols-outlined text-[18px]">
                    add
                </span>
                Tambah Aktivitas
            </button>
        </div>
    </div>


    {{-- NOTIFIKASI SUKSES --}}
    @if (session('success'))
        <div class="mt-6 flex items-center justify-between rounded-xl bg-primary/10 p-unit-lg text-primary">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">
                    check_circle
                </span>
                <span class="text-sm font-medium">
                    {{ session('success') }}
                </span>
            </div>
        </div>
    @endif


    {{-- TABEL DATA AKTIVITAS --}}
    <div class="mt-6 overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">

        <div class="flex items-center justify-between bg-surface-container-low p-unit-lg">
            <h2 class="text-xl font-semibold text-on-surface">
                Daftar Aktivitas
            </h2>
            <span class="text-xs font-medium text-on-surface-variant">
                Total: {{ count($activities) }} Data
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low text-xs font-medium uppercase text-on-surface-variant">
                    <tr>
                        <th class="px-unit-lg py-unit-sm">Deskripsi Aktivitas</th>
                        <th class="px-unit-lg py-unit-sm">Tanggal</th>
                        <th class="px-unit-lg py-unit-sm text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-on-surface">
                    @forelse ($activities as $index =>$activity)
                        <tr class="group transition-colors hover:bg-surface-container">

                            {{-- DESKRIPSI --}}
                            <td class="px-unit-lg py-unit-md font-medium text-on-surface">
                                {{ $activity->deskripsi }}
                            </td>

                            {{-- TANGGAL --}}
                            <td class="px-unit-lg py-unit-md text-on-surface-variant">
                                {{ \Carbon\Carbon::parse($activity->tanggal)->translatedFormat('d F Y') }}
                            </td>

                            {{-- AKSI --}}
                            <td class="px-unit-lg py-unit-md text-right">
                                <div class="flex items-center justify-end gap-2">

                                    {{-- TOMBOL EDIT --}}
                                    <button type="button"
                                        onclick="openEditModal({{ $activity->id }}, '{{ addslashes($activity->deskripsi) }}', '{{$activity->tanggal }}')"
                                        title="Edit"
                                        class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary">
                                        <span class="material-symbols-outlined text-[18px]">
                                            edit
                                        </span>
                                    </button>

                                    {{-- TOMBOL HAPUS --}}
                                    <button type="button"
                                        onclick="openDeleteModal({{ $activity->id }})"
                                        title="Hapus"
                                        class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-error-container hover:text-on-error-container">
                                        <span class="material-symbols-outlined text-[18px]">
                                            delete
                                        </span>
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-unit-lg py-8 text-center text-sm text-on-surface-variant">
                                Belum ada data aktivitas terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>


    {{-- ==================== MODAL TAMBAH DATA (HTML5 DIALOG) ==================== --}}
    <dialog id="createModal" class="m-auto w-full max-w-md border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-md overflow-hidden rounded-xl bg-surface-container p-unit-lg shadow-lg">

            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-xl font-semibold text-on-surface">Tambah Aktivitas</h3>
                <button type="button" onclick="closeCreateModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ route('activity.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Deskripsi</label>
                    <input type="text" name="deskripsi" required placeholder="Masukkan deskripsi aktivitas"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Tanggal</label>
                    <input type="date" name="tanggal" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="mt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeCreateModal()"
                            class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </dialog>


    {{-- ==================== MODAL EDIT DATA (HTML5 DIALOG) ==================== --}}
    <dialog id="editModal" class="m-auto w-full max-w-md border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-md overflow-hidden rounded-xl bg-surface-container p-unit-lg shadow-lg">

            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-xl font-semibold text-on-surface">Edit Aktivitas</h3>
                <button type="button" onclick="closeEditModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="editForm" action="" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Deskripsi</label>
                    <input type="text" id="edit_deskripsi" name="deskripsi" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Tanggal</label>
                    <input type="date" id="edit_tanggal" name="tanggal" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="mt-2 flex justify-end gap-2">
                    <button type="button" onclick="closeEditModal()"
                            class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                            class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container">
                        Perbarui
                    </button>
                </div>
            </form>

        </div>
    </dialog>


    {{-- ==================== MODAL KONFIRMASI HAPUS (HTML5 DIALOG) ==================== --}}
    <dialog id="deleteModal" class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-container p-unit-lg shadow-lg">

            <div class="flex flex-col items-center gap-2 text-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-on-error-container">
                    <span class="material-symbols-outlined text-[24px]">warning</span>
                </div>

                <h3 class="text-lg font-semibold text-on-surface">Konfirmasi Hapus</h3>
                <p class="text-xs text-on-surface-variant">Apakah Anda yakin ingin menghapus data aktivitas ini? Tindakan ini tidak dapat dibatalkan.</p>
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
    const baseUrl = "{{ url('/admin/aktivitas') }}";

    // TAMBAH MODAL
    function openCreateModal() {
        document.getElementById('createModal').showModal();
    }
    function closeCreateModal() {
        document.getElementById('createModal').close();
    }

    // EDIT MODAL
    function openEditModal(id, deskripsi, tanggal) {
        document.getElementById('edit_deskripsi').value = deskripsi;
        document.getElementById('edit_tanggal').value = tanggal;
        document.getElementById('editForm').action = `${baseUrl}/${id}`;
        document.getElementById('editModal').showModal();
    }
    function closeEditModal() {
        document.getElementById('editModal').close();
    }

    // DELETE MODAL
    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `${baseUrl}/${id}`;
        document.getElementById('deleteModal').showModal();
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').close();
    }
</script>
@endpush