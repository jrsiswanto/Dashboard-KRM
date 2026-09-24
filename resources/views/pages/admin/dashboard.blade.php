@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
{{-- HEADER DASHBOARD --}}
<div class="flex flex-col gap-unit-md">
    <h1 class="text-3xl font-semibold text-on-surface">
        Dashboard KRM
    </h1>

    <p class="text-base text-on-surface-variant">
        Ikhtisar program dan aktivitas Kebun Raya Mangrove Surabaya.
    </p>
</div>


{{-- STATISTIK --}}
<div class="mt-6 grid grid-cols-1 gap-unit-md md:grid-cols-3">

    {{-- TOTAL PROGRAM --}}
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-low p-unit-lg shadow-sm transition-shadow hover:shadow-md">

        <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-primary/5 transition-transform group-hover:scale-150"></div>

        <div class="relative z-10 flex items-center justify-between">
            <span class="text-xs font-medium uppercase tracking-widest text-on-surface-variant">
                Total Program KRM
            </span>

            <span class="material-symbols-outlined text-primary">
                park
            </span>
        </div>

        <div class="relative z-10 mt-2 text-5xl font-bold text-on-surface">
            {{ $totalProgram ?? 0 }}
        </div>

        <span class="relative z-10 flex items-center gap-1 text-sm text-primary">
            <span class="material-symbols-outlined text-[16px]">
                arrow_upward
            </span>
            Program dalam sistem
        </span>

    </div>


    {{-- AKTIVITAS BULAN INI --}}
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-low p-unit-lg shadow-sm transition-shadow hover:shadow-md">

        <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-tertiary/5 transition-transform group-hover:scale-150"></div>

        <div class="relative z-10 flex items-center justify-between">
            <span class="text-xs font-medium uppercase tracking-widest text-on-surface-variant">
                Aktivitas Bulan Ini
            </span>

            <span class="material-symbols-outlined text-tertiary">
                analytics
            </span>
        </div>

        <div class="relative z-10 mt-2 text-5xl font-bold text-on-surface">
            {{ $aktivitasBulanIni ?? 0 }}
        </div>

        <span class="relative z-10 flex items-center gap-1 text-sm text-on-surface-variant">
            <span class="material-symbols-outlined text-[16px]">
                trending_up
            </span>
            Data dan pembaruan
        </span>

    </div>


    {{-- MITRA CSR --}}
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-low p-unit-lg shadow-sm transition-shadow hover:shadow-md">

        <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-secondary/5 transition-transform group-hover:scale-150"></div>

        <div class="relative z-10 flex items-center justify-between">
            <span class="text-xs font-medium uppercase tracking-widest text-on-surface-variant">
                Mitra CSR
            </span>

            <span class="material-symbols-outlined text-secondary">
                handshake
            </span>
        </div>

        <div class="relative z-10 mt-2 text-5xl font-bold text-on-surface">
            {{ $totalMitra ?? 0 }}
        </div>

        <span class="relative z-10 flex items-center gap-1 text-sm text-on-surface-variant">
            <span class="material-symbols-outlined text-[16px]">
                group
            </span>
            Mitra terdaftar aktif
        </span>

    </div>

</div>


{{-- BAGIAN UTAMA --}}
<div class="mt-6 grid grid-cols-1 items-start gap-unit-lg lg:grid-cols-12">

    {{-- KOLOM KIRI --}}
    <div class="flex flex-col gap-unit-lg lg:col-span-8">

        {{-- STATUS PROGRAM --}}
        <div class="overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">

            <div class="flex items-center justify-between bg-surface-container-low p-unit-lg">

                <h2 class="text-xl font-semibold text-on-surface">
                    Status Program KRM
                </h2>

                <a href="#"
                   class="flex items-center gap-1 text-xs font-medium text-primary transition-colors hover:text-on-primary-fixed-variant">

                    Lihat Semua

                    <span class="material-symbols-outlined text-[16px]">
                        arrow_forward
                    </span>

                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-surface-container-low text-xs font-medium uppercase text-on-surface-variant">

                        <tr>
                            <th class="px-unit-lg py-unit-sm">
                                Nama Program
                            </th>

                            <th class="px-unit-lg py-unit-sm">
                                Kategori
                            </th>

                            <th class="px-unit-lg py-unit-sm">
                                Status
                            </th>

                            <th class="px-unit-lg py-unit-sm text-right">
                                Aksi
                            </th>
                        </tr>

                    </thead>


                    <tbody class="text-sm text-on-surface">

                        @forelse ($programs ?? [] as $program)

                            <tr class="group cursor-pointer transition-colors hover:bg-surface-container">

                                <td class="px-unit-lg py-unit-md font-bold transition-colors group-hover:text-primary">
                                    {{ $program->nama }}
                                </td>

                                <td class="px-unit-lg py-unit-md text-on-surface-variant">
                                    {{ $program->kategori }}
                                </td>

                                <td class="px-unit-lg py-unit-md">

                                    @if ($program->status === 'published')

                                        <span class="inline-flex rounded-full bg-primary/10 px-2 py-1 text-[10px] font-bold uppercase text-primary">
                                            Published
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-error-container px-2 py-1 text-[10px] font-bold uppercase text-on-error-container">
                                            Draft
                                        </span>

                                    @endif

                                </td>

                                <td class="px-unit-lg py-unit-md text-right">

                                    <a href="#"
                                       class="text-on-surface-variant transition-colors hover:text-primary">

                                        <span class="material-symbols-outlined text-[18px]">
                                            edit
                                        </span>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="px-unit-lg py-8 text-center text-sm text-on-surface-variant">

                                    Belum ada program KRM.

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- AKTIVITAS PER BULAN --}}
        <div class="rounded-xl bg-surface-container-lowest p-unit-lg shadow-sm">

            <div class="mb-unit-lg flex items-center justify-between">

                <h2 class="text-xl font-semibold text-on-surface">
                    Aktivitas Program per Bulan
                </h2>

                <span class="text-xs font-medium text-on-surface-variant">
                    Tahun {{ date('Y') }}
                </span>

            </div>


            {{-- GRAFIK SEDERHANA --}}
            <div class="relative flex h-64 w-full items-end justify-between px-unit-sm">

                <div class="absolute left-0 top-0 flex h-full w-full flex-col justify-between opacity-20 pointer-events-none">

                    <div class="w-full border-t border-outline"></div>
                    <div class="w-full border-t border-outline"></div>
                    <div class="w-full border-t border-outline"></div>
                    <div class="w-full border-t border-outline"></div>

                </div>


                @php
                    $bulan = [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'Mei',
                        'Jun',
                        'Jul',
                        'Agu',
                        'Sep',
                        'Okt',
                        'Nov',
                        'Des'
                    ];
                @endphp


                @foreach ($bulan as $index => $namaBulan)

                    @php
                        $jumlah = $aktivitasBulanan[$index + 1] ?? 0;

                        $tinggi = $jumlah > 0
                            ? min(($jumlah / max($maksAktivitas ?? 1, 1)) * 100, 100)
                            : 5;
                    @endphp

                    <div class="group relative z-10 flex h-full w-full items-end justify-center">

                        <div
                            class="relative w-6 rounded-t-sm bg-primary/30 transition-colors hover:bg-primary"
                            style="height: {{ $tinggi }}%;"
                        >

                            <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs font-medium text-on-surface opacity-0 transition-opacity group-hover:opacity-100">
                                {{ $jumlah }}
                            </span>

                            <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-on-surface-variant">
                                {{ $namaBulan }}
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="h-6"></div>

        </div>

    </div>


    {{-- KOLOM KANAN --}}
    <div class="flex flex-col gap-unit-lg lg:col-span-4">

        {{-- TINDAKAN CEPAT --}}
        <div class="flex flex-col gap-unit-md rounded-xl bg-surface-container-lowest p-unit-lg shadow-sm">

            <h2 class="text-xl font-semibold text-on-surface">
                Tindakan Cepat
            </h2>

            <a href="#"
               class="flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-4 py-3 text-xs font-medium uppercase tracking-widest text-on-primary shadow-sm transition-colors hover:bg-primary-container">

                <span class="material-symbols-outlined text-[18px]">
                    add_circle
                </span>

                Tambah Data Kegiatan

            </a>


            <a href="#"
               class="flex w-full items-center justify-center gap-2 rounded-xl border-2 border-primary bg-transparent px-4 py-3 text-xs font-medium uppercase tracking-widest text-primary transition-colors hover:bg-surface-container">

                <span class="material-symbols-outlined text-[18px]">
                    description
                </span>

                Buat Laporan CSR

            </a>

        </div>


        {{-- AKTIVITAS TERAKHIR --}}
        <div class="flex h-full flex-col rounded-xl bg-surface-container-lowest p-unit-lg shadow-sm">

            <div class="mb-unit-lg flex items-center justify-between">

                <h2 class="text-xl font-semibold text-on-surface">
                    Aktivitas Terakhir
                </h2>

            </div>


            <div class="relative flex flex-col gap-unit-md">

                @forelse ($aktivitasTerakhir ?? [] as $aktivitas)

                    <div class="relative z-10 flex gap-unit-md">

                        <div class="mt-1 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-primary">

                            <span class="material-symbols-outlined text-[14px] text-on-primary">
                                edit_document
                            </span>

                        </div>

                        <div class="flex flex-col gap-1">

                            <p class="text-sm text-on-surface">
                                {{ $aktivitas->deskripsi }}
                            </p>

                            <span class="text-xs text-on-surface-variant">
                                {{ $aktivitas->created_at?->diffForHumans() }}
                            </span>

                        </div>

                    </div>

                @empty

                    <p class="text-sm text-on-surface-variant">
                        Belum ada aktivitas terbaru.
                    </p>

                @endforelse

            </div>


            <button
                type="button"
                class="mt-unit-lg w-full rounded-lg py-2 text-center text-xs font-medium text-primary transition-colors hover:bg-surface-container">

                Muat Lebih Banyak

            </button>

        </div>

    </div>

</div>
```

@endsection
