@extends('layouts.admin')

@section('title', 'Pelaporan CSR')

@section('content')

    {{-- ========================================================= --}}
    {{-- PAGE HEADER & TOMBOL TAMBAH --}}
    {{-- ========================================================= --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="text-xs font-semibold uppercase tracking-widest text-primary">Kemitraan KRM</span>
            <h1 class="text-3xl font-bold tracking-tight text-on-surface mt-1">
                Pelaporan CSR
            </h1>
            <p class="text-sm text-on-surface-variant mt-1">
                Ikhtisar dan riwayat laporan kemitraan perusahaan.
            </p>
        </div>

        <button type="button" onclick="openCreateModal()" class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-on-primary shadow-sm transition-colors hover:bg-primary-container">
            <span class="material-symbols-outlined text-[18px]">add</span>
            Tambah Kemitraan
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
    {{-- SUMMARY CARDS --}}
    {{-- ========================================================= --}}
    <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-3">

        {{-- Card 1: Total Mitra Aktif --}}
        <div class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest p-6 shadow-sm transition-all hover:shadow-md flex flex-col justify-between h-[130px]">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-primary/5 transition-transform group-hover:scale-150"></div>
            <p class="text-xs font-semibold uppercase tracking-wider text-on-surface-variant z-10">Total Mitra Aktif</p>
            <div class="flex items-end justify-between z-10">
                <p class="text-4xl font-bold tracking-tight text-primary">{{ $totalMitraAktif }}</p>
                <span class="material-symbols-outlined text-primary/30 text-[36px]">handshake</span>
            </div>
        </div>

        {{-- Card 2: Laporan Tahun Ini --}}
        <div class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest p-6 shadow-sm transition-all hover:shadow-md flex flex-col justify-between h-[130px]">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-tertiary/5 transition-transform group-hover:scale-150"></div>
            <p class="text-xs font-semibold uppercase tracking-wider text-on-surface-variant z-10">Laporan Tahun Ini</p>
            <div class="flex items-end justify-between z-10">
                <p class="text-4xl font-bold tracking-tight text-tertiary">{{ $laporanTahunIni }}</p>
                <span class="material-symbols-outlined text-tertiary/30 text-[36px]">summarize</span>
            </div>
        </div>

        {{-- Card 3: Program Didukung --}}
        <div class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest p-6 shadow-sm transition-all hover:shadow-md flex flex-col justify-between h-[130px]">
            <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-secondary/5 transition-transform group-hover:scale-150"></div>
            <p class="text-xs font-semibold uppercase tracking-wider text-on-surface-variant z-10">Program Didukung</p>
            <div class="flex items-end justify-between z-10">
                <p class="text-4xl font-bold tracking-tight text-secondary">{{ $programDidukung }}</p>
                <span class="material-symbols-outlined text-secondary/30 text-[36px]">forest</span>
            </div>
        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN TABLE SECTION --}}
    {{-- ========================================================= --}}
    <div class="overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm">
        
        <div class="flex items-center justify-between border-b border-outline-variant bg-surface-container-low px-6 py-4">
            <h2 class="text-lg font-semibold text-on-surface">Riwayat Kemitraan CSR</h2>
            <div class="flex items-center gap-2">
                <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container hover:text-on-surface" title="Filter">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span>
                </button>
                <button type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container hover:text-on-surface" title="Download">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[900px]">
                <thead class="bg-surface-container-low/50 text-xs font-semibold uppercase tracking-wider text-on-surface-variant border-b border-outline-variant">
                    <tr>
                        <th class="px-6 py-3.5">Mitra Perusahaan</th>
                        <th class="px-6 py-3.5">Program KRM</th>
                        <th class="px-6 py-3.5">Dukungan</th>
                        <th class="px-6 py-3.5">Periode</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-outline-variant/50 text-sm text-on-surface">
                    @if (count($mitras) > 0)
                        @foreach ($mitras as $mitra)
                            <tr class="group transition-colors hover:bg-surface-container-low">
                                <td class="px-6 py-4 font-medium text-on-surface group-hover:text-primary">
                                    {{ $mitra->nama_perusahaan }}
                                </td>
                                <td class="px-6 py-4 text-on-surface-variant">
                                    {{ $mitra->program_krm }}
                                </td>
                                <td class="px-6 py-4 text-on-surface-variant">
                                    {{ $mitra->dukungan }}
                                </td>
                                <td class="px-6 py-4 text-xs text-on-surface-variant">
                                    {{ $mitra->periode }}
                                </td>
                                <td class="px-6 py-4">
                                    @if (strtoupper($mitra->status) === 'AKTIF')
                                        <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-semibold uppercase text-primary">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-surface-variant px-2.5 py-0.5 text-xs font-semibold uppercase text-on-surface-variant">
                                            Selesai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        {{-- TOMBOL EDIT --}}
                                        <button type="button" 
                                            onclick="openEditModal({{ $mitra->id }}, '{{ addslashes($mitra->nama_perusahaan) }}', '{{ addslashes($mitra->program_krm) }}', '{{ addslashes($mitra->dukungan) }}', '{{ addslashes($mitra->periode) }}', '{{$mitra->status }}')"
                                            class="rounded-lg p-1.5 text-secondary hover:bg-secondary/10 transition-colors" title="Edit">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>

                                        {{-- TOMBOL HAPUS --}}
                                        <button type="button" 
                                            onclick="openDeleteModal({{ $mitra->id }})"
                                            class="rounded-lg p-1.5 text-error hover:bg-error-container/20 transition-colors" title="Hapus">
                                            <span class="material-symbols-outlined text-[18px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-sm text-on-surface-variant">
                                Belum ada data kemitraan CSR.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- PAGINATION DINAMIS --}}
        @if($mitras->hasPages())
            <div class="border-t border-outline-variant bg-surface-container-low px-6 py-3.5">
                {{ $mitras->links() }}
            </div>
        @endif

    </div>


    {{-- ==================== MODAL TAMBAH MITRA (HTML5 DIALOG) ==================== --}}
    <dialog id="createModal" class="m-auto w-full max-w-lg border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Tambah Kemitraan CSR</h3>
                <button type="button" onclick="closeCreateModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ url('/admin/csr') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Mitra Perusahaan</label>
                    <input type="text" name="nama_perusahaan" required placeholder="Contoh: PT Telkom Indonesia"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Program KRM</label>
                    <input type="text" name="program_krm" required placeholder="Contoh: Penanaman 1.000 Bibit Mangrove"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Bentuk Dukungan</label>
                    <input type="text" name="dukungan" required placeholder="Contoh: Dana CSR & Relawan Perusahaan"
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Periode Kemitraan</label>
                        <input type="text" name="periode" required placeholder="Contoh: 2024 - 2025"
                               class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status Kemitraan</label>
                        <select name="status" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="AKTIF">Aktif</option>
                            <option value="SELESAI">Selesai</option>
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


    {{-- ==================== MODAL EDIT MITRA (HTML5 DIALOG) ==================== --}}
    <dialog id="editModal" class="m-auto w-full max-w-lg border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Edit Kemitraan CSR</h3>
                <button type="button" onclick="closeEditModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="editForm" action="" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Mitra Perusahaan</label>
                    <input type="text" id="edit_nama_perusahaan" name="nama_perusahaan" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Program KRM</label>
                    <input type="text" id="edit_program_krm" name="program_krm" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Bentuk Dukungan</label>
                    <input type="text" id="edit_dukungan" name="dukungan" required
                           class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Periode Kemitraan</label>
                        <input type="text" id="edit_periode" name="periode" required
                               class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status Kemitraan</label>
                        <select id="edit_status" name="status" required class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm text-on-surface focus:border-primary focus:outline-none">
                            <option value="AKTIF">Aktif</option>
                            <option value="SELESAI">Selesai</option>
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


    {{-- ==================== MODAL KONFIRMASI HAPUS (HTML5 DIALOG) ==================== --}}
    <dialog id="deleteModal" class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="flex flex-col items-center gap-2 text-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-on-error-container">
                    <span class="material-symbols-outlined text-[24px]">warning</span>
                </div>

                <h3 class="text-lg font-semibold text-on-surface">Konfirmasi Hapus</h3>
                <p class="text-xs text-on-surface-variant">Apakah Anda yakin ingin menghapus data kemitraan ini? Tindakan ini tidak dapat dibatalkan.</p>
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
    const baseUrl = "{{ url('/admin/csr') }}";

    // --- MODAL TAMBAH ---
    function openCreateModal() {
        document.getElementById('createModal').showModal();
    }
    function closeCreateModal() {
        document.getElementById('createModal').close();
    }

    // --- MODAL EDIT ---
    function openEditModal(id, namaPerusahaan, programKrm, dukungan, periode, status) {
        document.getElementById('edit_nama_perusahaan').value = namaPerusahaan;
        document.getElementById('edit_program_krm').value = programKrm;
        document.getElementById('edit_dukungan').value = dukungan;
        document.getElementById('edit_periode').value = periode;
        document.getElementById('edit_status').value = status.toUpperCase();

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