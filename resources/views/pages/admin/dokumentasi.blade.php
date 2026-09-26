@extends('layouts.admin')

@section('title', 'Dokumentasi')

@section('content')

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="text-xs font-semibold uppercase tracking-widest text-primary">Arsip Media</span>
            <h1 class="text-3xl font-bold tracking-tight text-on-surface mt-1">
                Dokumentasi
            </h1>
            <p class="text-sm text-on-surface-variant mt-1 max-w-2xl">
                Arsip media KRM Surabaya, mencakup konservasi mangrove, program CSR, dan dokumentasi keanekaragaman hayati.
            </p>
        </div>

        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-on-primary shadow-sm transition-colors hover:bg-primary-container">
            <span class="material-symbols-outlined text-[18px]">upload</span>
            Unggah Dokumentasi
        </button>
    </div>


    {{-- ========================================================= --}}
    {{-- FILTER & SEARCH SECTION --}}
    {{-- ========================================================= --}}
    <div class="mb-6 flex flex-col gap-4 rounded-xl border border-outline-variant bg-surface-container-lowest p-4 shadow-sm">
        
        {{-- Search Input --}}
        <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant">search</span>
            <input type="text" placeholder="Cari nama file, program, atau uploader..." class="w-full rounded-lg border border-outline-variant bg-surface-container-low py-2.5 pl-10 pr-4 text-sm text-on-surface placeholder:text-on-surface-variant/60 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
        </div>

        {{-- Controls Bar --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            
            {{-- Dropdowns --}}
            <div class="flex flex-wrap items-center gap-3">
                <div class="relative min-w-[160px]">
                    <select class="w-full appearance-none rounded-lg border border-outline-variant bg-surface-container-low py-2 pl-4 pr-10 text-xs text-on-surface focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer">
                        <option value="">Semua Program</option>
                        <option value="mangrove">Konservasi Mangrove</option>
                        <option value="solar">Solar Panel CSR</option>
                        <option value="biodiversity">Keanekaragaman Hayati</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
                </div>

                <div class="relative min-w-[150px]">
                    <select class="w-full appearance-none rounded-lg border border-outline-variant bg-surface-container-low py-2 pl-4 pr-10 text-xs text-on-surface focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer">
                        <option value="">Semua Media</option>
                        <option value="image">Foto</option>
                        <option value="video">Video</option>
                        <option value="document">Dokumen</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
                </div>

                <div class="relative min-w-[150px]">
                    <input type="date" class="w-full rounded-lg border border-outline-variant bg-surface-container-low py-1.5 px-3 text-xs text-on-surface focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer">
                </div>
            </div>

            {{-- Grid / Table Switcher --}}
            <div class="flex items-center gap-1 rounded-lg border border-outline-variant bg-surface-container-low p-1">
                <button type="button" id="view-grid" class="flex h-8 w-8 items-center justify-center rounded-md bg-surface text-primary shadow-sm transition-all" title="Tampilan Grid">
                    <span class="material-symbols-outlined text-[18px]">grid_view</span>
                </button>
                <button type="button" id="view-table" class="flex h-8 w-8 items-center justify-center rounded-md text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all" title="Tampilan Tabel">
                    <span class="material-symbols-outlined text-[18px]">view_list</span>
                </button>
            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- GRID VIEW DOKUMENTASI --}}
    {{-- ========================================================= --}}
    <div id="grid-view" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 transition-all duration-300">

        {{-- Card 1 --}}
        <div class="group flex flex-col overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all hover:shadow-md">
            <div class="relative aspect-video w-full overflow-hidden bg-surface-container-low">
                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPWDFLecW3rCZRkuNFz6twsr2wwGMu7rj0FOhwUhTfbZg9cfEUZE70z0wanqfkwlw6L4HZLcP18Uc4zeysWhl07BoDU6Dsq8Ao9sb1W-k7UZAGxF23gVGdLkUqSWwQcPQSGno3Elp2qRQ-cVlgfEmKRZxkqQqST0qadiktWeiAJ3Tg2Ru2djG9NNgK5zpnINJg_9TQaV8rAY5hmigESPg5ItmAJSdOjKKabBMq6v6R5tyzCxBH3O-Y_w"
                     alt="Akar Napas Rhizophora">
                <div class="absolute left-3 top-3 flex items-center gap-1 rounded bg-black/50 px-2 py-0.5 text-white backdrop-blur-sm shadow-sm">
                    <span class="material-symbols-outlined text-[14px]">image</span>
                    <span class="text-[10px] font-semibold uppercase">JPG</span>
                </div>
            </div>

            <div class="flex flex-1 flex-col p-4">
                <div class="mb-1 flex items-start justify-between">
                    <h3 class="line-clamp-1 text-sm font-semibold text-on-surface transition-colors group-hover:text-primary" title="Akar_Napas_Rhizophora.jpg">
                        Akar_Napas_Rhizophora
                    </h3>
                    <button type="button" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined text-[18px]">more_vert</span>
                    </button>
                </div>

                <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    Konservasi Mangrove
                </p>

                <div class="mt-auto flex items-center justify-between border-t border-outline-variant/40 pt-3">
                    <span class="text-xs text-on-surface-variant">
                        24 Okt 2023
                    </span>
                    <span class="inline-flex items-center rounded-full bg-primary/10 px-2 py-0.5 text-[10px] font-semibold uppercase text-primary">
                        Publik
                    </span>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="group flex flex-col overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all hover:shadow-md">
            <div class="relative aspect-video w-full overflow-hidden bg-surface-container-low">
                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOuQfd298AFy5TaLywbcORk55tWQisFFGZDmiuoDmoUVfCvfgnwRX-pX8fY5vZpx31EwxHMWxIrky-nwcffmHfaOZrp6Mb3mmj9jtk-16qtKLbwWKopJ8oejkfvB0jIwc0Rl33MiH7BRZMXMeAH60fraNd1Q-6qvrMMXqVoSSFK5xWqhjH33zgJZHPMJrTUK0gGrpScOSkl7oIkIeYSaGszFAlGrHXSQlSBzKoP26WICBUbkx2MpR6kw"
                     alt="Drone Solar Array">
                <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-black/50 text-white backdrop-blur-sm">
                        <span class="material-symbols-outlined text-[20px]">play_arrow</span>
                    </div>
                </div>
                <div class="absolute left-3 top-3 flex items-center gap-1 rounded bg-black/50 px-2 py-0.5 text-white backdrop-blur-sm shadow-sm">
                    <span class="material-symbols-outlined text-[14px]">movie</span>
                    <span class="text-[10px] font-semibold uppercase">MP4</span>
                </div>
                <div class="absolute bottom-2 right-2 rounded bg-black/70 px-1.5 py-0.5 text-[10px] font-medium text-white backdrop-blur-sm">
                    03:45
                </div>
            </div>

            <div class="flex flex-1 flex-col p-4">
                <div class="mb-1 flex items-start justify-between">
                    <h3 class="line-clamp-1 text-sm font-semibold text-on-surface transition-colors group-hover:text-primary" title="Drone_Solar_Array_Final.mp4">
                        Drone_Solar_Array_Final
                    </h3>
                    <button type="button" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined text-[18px]">more_vert</span>
                    </button>
                </div>

                <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    Solar Panel CSR
                </p>

                <div class="mt-auto flex items-center justify-between border-t border-outline-variant/40 pt-3">
                    <span class="text-xs text-on-surface-variant">
                        22 Okt 2023
                    </span>
                    <span class="inline-flex items-center rounded-full bg-secondary-container/50 px-2 py-0.5 text-[10px] font-semibold uppercase text-on-secondary-container">
                        Internal
                    </span>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="group flex flex-col overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all hover:shadow-md">
            <div class="relative flex aspect-video w-full items-center justify-center bg-surface-container-low">
                <span class="material-symbols-outlined text-[48px] text-on-surface-variant/40">picture_as_pdf</span>
                <div class="absolute left-3 top-3 flex items-center gap-1 rounded bg-surface-container-high px-2 py-0.5 text-on-surface-variant shadow-sm border border-outline-variant">
                    <span class="material-symbols-outlined text-[14px]">description</span>
                    <span class="text-[10px] font-semibold uppercase">PDF</span>
                </div>
            </div>

            <div class="flex flex-1 flex-col p-4">
                <div class="mb-1 flex items-start justify-between">
                    <h3 class="line-clamp-1 text-sm font-semibold text-on-surface transition-colors group-hover:text-primary" title="Laporan_Inventarisasi_Flora.pdf">
                        Laporan_Inventarisasi_Flora
                    </h3>
                    <button type="button" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined text-[18px]">more_vert</span>
                    </button>
                </div>

                <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    Keanekaragaman Hayati
                </p>

                <div class="mt-auto flex items-center justify-between border-t border-outline-variant/40 pt-3">
                    <span class="text-xs text-on-surface-variant">
                        18 Okt 2023
                    </span>
                    <span class="inline-flex items-center rounded-full bg-error-container/30 px-2 py-0.5 text-[10px] font-semibold uppercase text-on-error-container">
                        Rahasia
                    </span>
                </div>
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="group flex flex-col overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all hover:shadow-md">
            <div class="relative aspect-video w-full overflow-hidden bg-surface-container-low">
                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBn43xekM-OeXZXOQFJcdCrcijyLixJe1xnZV3CmRnEWrlEihDBeyqM5VKxLZMzlP7NdmUnLdbwPO9tTIzHfb-xmSNieYS997oVBNPJ1v05N3n0gTIg93kpDstJ4bRNoVOTZRjjyVPExKKsNKErupfK-EeJFDbpMmETfLijF6lRTuywm9ZNP2RXMYX5P5hO7LVqGrLZT55FIAUrz4cxhv-AZUNBe3B1U1865ZT4adMKJXs0VcNSfUrvbw"
                     alt="Fauna Ikan Glodok">
                <div class="absolute left-3 top-3 flex items-center gap-1 rounded bg-black/50 px-2 py-0.5 text-white backdrop-blur-sm shadow-sm">
                    <span class="material-symbols-outlined text-[14px]">image</span>
                    <span class="text-[10px] font-semibold uppercase">JPG</span>
                </div>
            </div>

            <div class="flex flex-1 flex-col p-4">
                <div class="mb-1 flex items-start justify-between">
                    <h3 class="line-clamp-1 text-sm font-semibold text-on-surface transition-colors group-hover:text-primary" title="Fauna_Ikan_Glodok_Mangrove.jpg">
                        Fauna_Ikan_Glodok_Mangrove
                    </h3>
                    <button type="button" class="text-on-surface-variant hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined text-[18px]">more_vert</span>
                    </button>
                </div>

                <p class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    Keanekaragaman Hayati
                </p>

                <div class="mt-auto flex items-center justify-between border-t border-outline-variant/40 pt-3">
                    <span class="text-xs text-on-surface-variant">
                        15 Okt 2023
                    </span>
                    <span class="inline-flex items-center rounded-full bg-primary/10 px-2 py-0.5 text-[10px] font-semibold uppercase text-primary">
                        Publik
                    </span>
                </div>
            </div>
        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TABLE VIEW DOKUMENTASI (PILIHAN TAMPILAN TABEL) --}}
    {{-- ========================================================= --}}
    <div id="table-view" class="hidden overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all duration-300 opacity-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead class="bg-surface-container-low/50 text-xs font-semibold uppercase tracking-wider text-on-surface-variant border-b border-outline-variant">
                    <tr>
                        <th class="px-6 py-3.5">Nama Media</th>
                        <th class="px-6 py-3.5">Program</th>
                        <th class="px-6 py-3.5">Tipe</th>
                        <th class="px-6 py-3.5">Tanggal</th>
                        <th class="px-6 py-3.5">Akses</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/50 text-sm text-on-surface">
                    <tr class="group transition-colors hover:bg-surface-container-low">
                        <td class="px-6 py-4 font-medium text-on-surface group-hover:text-primary">Akar_Napas_Rhizophora.jpg</td>
                        <td class="px-6 py-4 text-on-surface-variant">Konservasi Mangrove</td>
                        <td class="px-6 py-4 text-xs uppercase font-semibold text-on-surface-variant">JPG</td>
                        <td class="px-6 py-4 text-xs text-on-surface-variant">24 Okt 2023</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-semibold uppercase text-primary">Publik</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button type="button" class="rounded-lg p-1.5 text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[18px]">more_vert</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="group transition-colors hover:bg-surface-container-low">
                        <td class="px-6 py-4 font-medium text-on-surface group-hover:text-primary">Drone_Solar_Array_Final.mp4</td>
                        <td class="px-6 py-4 text-on-surface-variant">Solar Panel CSR</td>
                        <td class="px-6 py-4 text-xs uppercase font-semibold text-on-surface-variant">MP4</td>
                        <td class="px-6 py-4 text-xs text-on-surface-variant">22 Okt 2023</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-secondary-container/50 px-2.5 py-0.5 text-xs font-semibold uppercase text-on-secondary-container">Internal</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button type="button" class="rounded-lg p-1.5 text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[18px]">more_vert</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnGrid = document.getElementById('view-grid');
    const btnTable = document.getElementById('view-table');
    const viewGrid = document.getElementById('grid-view');
    const viewTable = document.getElementById('table-view');

    if (btnTable && btnGrid && viewGrid && viewTable) {
        btnTable.addEventListener('click', () => {
            btnTable.classList.add('bg-surface', 'shadow-sm', 'text-primary');
            btnTable.classList.remove('text-on-surface-variant');
            
            btnGrid.classList.remove('bg-surface', 'shadow-sm', 'text-primary');
            btnGrid.classList.add('text-on-surface-variant');

            viewGrid.classList.add('hidden');
            viewTable.classList.remove('hidden');
            setTimeout(() => viewTable.classList.remove('opacity-0'), 20);
        });

        btnGrid.addEventListener('click', () => {
            btnGrid.classList.add('bg-surface', 'shadow-sm', 'text-primary');
            btnGrid.classList.remove('text-on-surface-variant');
            
            btnTable.classList.remove('bg-surface', 'shadow-sm', 'text-primary');
            btnTable.classList.add('text-on-surface-variant');

            viewTable.classList.add('hidden', 'opacity-0');
            viewGrid.classList.remove('hidden');
        });
    }
});
</script>
@endpush