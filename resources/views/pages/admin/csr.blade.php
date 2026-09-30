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
        {{-- ========================================================= --}}
{{-- PENGAJUAN CSR --}}
{{-- ========================================================= --}}
<div class="mb-8 overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm">

    <div class="flex items-center justify-between border-b border-outline-variant bg-surface-container-low px-6 py-4">
        <div>
            <h2 class="text-lg font-semibold text-on-surface">
                Pengajuan CSR
            </h2>

            <p class="mt-1 text-xs text-on-surface-variant">
                Daftar pengajuan kemitraan yang dikirim melalui website.
            </p>
        </div>

        @if($pengajuanBaru > 0)
            <span class="inline-flex items-center rounded-full bg-tertiary/10 px-3 py-1 text-xs font-semibold text-tertiary">
                {{ $pengajuanBaru }} Baru
            </span>
        @endif
    </div>


    <div class="overflow-x-auto">

        <table class="w-full min-w-[1000px] border-collapse text-left">

            <thead class="border-b border-outline-variant bg-surface-container-low/50 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">

                <tr>
                    <th class="px-6 py-3.5">
                        Pengaju
                    </th>

                    <th class="px-6 py-3.5">
                        Perusahaan
                    </th>

                    <th class="px-6 py-3.5">
                        Email
                    </th>

                    <th class="px-6 py-3.5">
                        Kebutuhan
                    </th>

                    <th class="px-6 py-3.5">
                        Tanggal
                    </th>

                    <th class="px-6 py-3.5">
                        Status
                    </th>

                    <th class="px-6 py-3.5 text-right">
                        Aksi
                    </th>
                </tr>

            </thead>


            <tbody class="divide-y divide-outline-variant/50 text-sm text-on-surface">

                @forelse($pengajuans as $pengajuan)

                    <tr class="group transition-colors hover:bg-surface-container-low">

                        <td class="px-6 py-4">
                            <p class="font-medium text-on-surface">
                                {{ $pengajuan->nama }}
                            </p>
                        </td>


                        <td class="px-6 py-4">
                            <p class="font-medium text-on-surface">
                                {{ $pengajuan->perusahaan }}
                            </p>
                        </td>


                        <td class="px-6 py-4 text-on-surface-variant">
                            {{ $pengajuan->email }}
                        </td>


                        <td class="px-6 py-4">

                            @php
                                $kategori = [
                                    'bibit' => 'Penanaman Bibit Mangrove',
                                    'edukasi' => 'Edukasi & Pemberdayaan',
                                    'offset' => 'Kemitraan Offset Karbon',
                                    'lainnya' => 'Kemitraan Lainnya',
                                ];
                            @endphp

                            <span class="text-on-surface-variant">
                                {{ $kategori[$pengajuan->kategori] ?? $pengajuan->kategori }}
                            </span>

                        </td>


                        <td class="px-6 py-4 text-xs text-on-surface-variant">
                            {{ $pengajuan->created_at->format('d/m/Y H:i') }}
                        </td>


                        <td class="px-6 py-4">

                            @if($pengajuan->status === 'BARU')

                                <span class="inline-flex items-center rounded-full bg-tertiary/10 px-2.5 py-0.5 text-xs font-semibold uppercase text-tertiary">
                                    Baru
                                </span>

                            @else

                                <span class="inline-flex items-center rounded-full bg-surface-variant px-2.5 py-0.5 text-xs font-semibold uppercase text-on-surface-variant">
                                    Dibaca
                                </span>

                            @endif

                        </td>


                        <td class="px-6 py-4">

                            <div class="flex items-center justify-end gap-1">

                                {{-- BACA --}}
                                <button
                                    type="button"
                                    onclick="openPengajuanModal(
                                        {{ $pengajuan->id }},
                                        @js($pengajuan->nama),
                                        @js($pengajuan->perusahaan),
                                        @js($pengajuan->email),
                                        @js($kategori[$pengajuan->kategori] ?? $pengajuan->kategori),
                                        @js($pengajuan->pesan),
                                        '{{ $pengajuan->status }}'
                                    )"
                                    class="rounded-lg p-1.5 text-secondary transition-colors hover:bg-secondary/10"
                                    title="Baca Pengajuan"
                                >
                                    <span class="material-symbols-outlined text-[18px]">
                                        visibility
                                    </span>
                                </button>


                                {{-- HAPUS --}}
                                <button
                                    type="button"
                                    onclick="openDeletePengajuanModal({{ $pengajuan->id }})"
                                    class="rounded-lg p-1.5 text-error transition-colors hover:bg-error-container/20"
                                    title="Hapus"
                                >
                                    <span class="material-symbols-outlined text-[18px]">
                                        delete
                                    </span>
                                </button>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="px-6 py-8 text-center text-sm text-on-surface-variant"
                        >
                            Belum ada pengajuan CSR.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    @if($pengajuans->hasPages())

        <div class="border-t border-outline-variant bg-surface-container-low px-6 py-3.5">
            {{ $pengajuans->links() }}
        </div>

    @endif

</div>
        
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
    {{-- ========================================================= --}}
{{-- MODAL BACA PENGAJUAN CSR --}}
{{-- ========================================================= --}}
<dialog
    id="pengajuanModal"
    class="m-auto w-full max-w-2xl border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm"
>

    <div class="w-full max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

        <div class="mb-5 flex items-center justify-between border-b border-outline-variant pb-3">

            <div>
                <h3 class="text-xl font-semibold text-on-surface">
                    Detail Pengajuan CSR
                </h3>

                <p class="mt-1 text-xs text-on-surface-variant">
                    Informasi yang dikirim melalui formulir CSR.
                </p>
            </div>

            <button
                type="button"
                onclick="closePengajuanModal()"
                class="text-on-surface-variant hover:text-on-surface"
            >
                <span class="material-symbols-outlined">
                    close
                </span>
            </button>

        </div>


        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div>
                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                    Nama Lengkap
                </p>

                <p
                    id="detail_nama"
                    class="text-sm font-medium text-on-surface"
                ></p>
            </div>


            <div>
                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                    Perusahaan
                </p>

                <p
                    id="detail_perusahaan"
                    class="text-sm font-medium text-on-surface"
                ></p>
            </div>


            <div>
                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                    Email Korporat
                </p>

                <p
                    id="detail_email"
                    class="text-sm text-on-surface"
                ></p>
            </div>


            <div>
                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                    Bentuk Program
                </p>

                <p
                    id="detail_kategori"
                    class="text-sm text-on-surface"
                ></p>
            </div>

        </div>


        <div class="mt-6">

            <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-on-surface-variant">
                Pesan / Objektif CSR & ESG
            </p>

            <div class="rounded-xl bg-surface-container-low p-4">

                <p
                    id="detail_pesan"
                    class="whitespace-pre-line text-sm leading-6 text-on-surface"
                ></p>

            </div>

        </div>


        <div class="mt-6 flex justify-end border-t border-outline-variant pt-4">

            <form
                id="readPengajuanForm"
                method="POST"
            >

                @csrf
                @method('PUT')

                <button
                    type="submit"
                    id="readPengajuanButton"
                    class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary shadow-sm hover:bg-primary-container"
                >
                    Tandai Sudah Dibaca
                </button>

            </form>

        </div>

    </div>

</dialog>

{{-- ========================================================= --}}
{{-- MODAL HAPUS PENGAJUAN CSR --}}
{{-- ========================================================= --}}
<dialog
    id="deletePengajuanModal"
    class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm"
>

    <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-container p-6 shadow-lg">

        <div class="flex flex-col items-center gap-2 text-center">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-on-error-container">

                <span class="material-symbols-outlined text-[24px]">
                    warning
                </span>

            </div>

            <h3 class="text-lg font-semibold text-on-surface">
                Hapus Pengajuan
            </h3>

            <p class="text-xs text-on-surface-variant">
                Apakah Anda yakin ingin menghapus pengajuan CSR ini?
                Tindakan ini tidak dapat dibatalkan.
            </p>

        </div>


        <form
            id="deletePengajuanForm"
            method="POST"
            class="mt-6 flex justify-center gap-2"
        >

            @csrf
            @method('DELETE')

            <button
                type="button"
                onclick="closeDeletePengajuanModal()"
                class="w-full rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container"
            >
                Batal
            </button>

            <button
                type="submit"
                class="w-full rounded-xl bg-error-container px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-error-container transition-colors hover:opacity-80"
            >
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

    // ============================================================
// PENGAJUAN CSR
// ============================================================

const pengajuanBaseUrl = "{{ url('/admin/csr/pengajuan') }}";


// ------------------------------------------------------------
// BACA PENGAJUAN
// ------------------------------------------------------------

function openPengajuanModal(
    id,
    nama,
    perusahaan,
    email,
    kategori,
    pesan,
    status
) {
    document.getElementById('detail_nama').textContent = nama;
    document.getElementById('detail_perusahaan').textContent = perusahaan;
    document.getElementById('detail_email').textContent = email;
    document.getElementById('detail_kategori').textContent = kategori;
    document.getElementById('detail_pesan').textContent = pesan;

    const readForm = document.getElementById('readPengajuanForm');
    const readButton = document.getElementById('readPengajuanButton');

    readForm.action = `${pengajuanBaseUrl}/${id}/read`;

    if (status === 'DIBACA') {
        readButton.style.display = 'none';
    } else {
        readButton.style.display = 'inline-flex';
    }

    document
        .getElementById('pengajuanModal')
        .showModal();
}


function closePengajuanModal() {
    document
        .getElementById('pengajuanModal')
        .close();
}


// ------------------------------------------------------------
// HAPUS PENGAJUAN
// ------------------------------------------------------------

function openDeletePengajuanModal(id) {
    document.getElementById('deletePengajuanForm').action =
        `${pengajuanBaseUrl}/${id}`;

    document
        .getElementById('deletePengajuanModal')
        .showModal();
}


function closeDeletePengajuanModal() {
    document
        .getElementById('deletePengajuanModal')
        .close();
}
</script>
@endpush