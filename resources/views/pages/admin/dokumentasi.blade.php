@extends('layouts.admin')

@section('title', 'Dokumentasi')

@section('content')

<div class="flex flex-col w-full h-full relative">

    {{-- Header Halaman --}}
    <div class="px-margin-page py-unit-xl flex justify-between items-start md:items-end relative z-10 flex-col md:flex-row gap-4">
        <div>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-unit-sm">
                Dokumentasi
            </h1>

            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Arsip media KRM Surabaya, mencakup konservasi mangrove,
                program CSR panel surya, dan dokumentasi keanekaragaman hayati.
            </p>
        </div>

        <button
            class="bg-primary hover:bg-primary-fixed-variant text-on-primary px-6 py-3 rounded-lg flex items-center gap-2 transition-colors shadow-sm font-label-md uppercase tracking-wider text-center leading-tight">
            <span class="material-symbols-outlined text-[20px]">
                upload
            </span>
            <span class="text-left">
                UNGGAH<br>DOKUMENTASI
            </span>
        </button>
    </div>


    {{-- Filter & Search Section --}}
    <div class="px-margin-page mb-unit-xl relative z-10">
        <div class="bg-surface-container rounded-xl p-4 flex flex-col gap-4 shadow-sm">

            {{-- Search Bar (Baris Atas) --}}
            <div class="w-full">
                <div class="relative flex items-center bg-surface rounded-lg px-3 border border-outline-variant focus-within:ring-2 focus-within:ring-primary focus-within:border-transparent transition-all h-11">
                    <span class="material-symbols-outlined text-on-surface-variant mr-2 text-[20px]">
                        search
                    </span>
                    <input
                        type="text"
                        placeholder="Cari nama file, program, atau uploader..."
                        class="bg-transparent border-none focus:ring-0 font-body-md text-on-surface w-full h-full outline-none placeholder:text-on-surface-variant/50"
                    >
                </div>
            </div>

            {{-- Filter & View Toggle (Baris Bawah) --}}
            <div class="flex flex-wrap justify-between items-center gap-4 w-full">
                
                {{-- Dropdowns --}}
                <div class="flex flex-wrap items-center gap-3">
                    <select class="h-11 bg-surface border border-outline-variant rounded-lg px-4 font-body-md text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent outline-none cursor-pointer appearance-none pr-10 min-w-[160px]">
                        <option value="">Semua Program</option>
                        <option value="mangrove">Konservasi Mangrove</option>
                        <option value="solar">Solar Panel CSR</option>
                        <option value="biodiversity">Keanekaragaman Hayati</option>
                    </select>

                    <select class="h-11 bg-surface border border-outline-variant rounded-lg px-4 font-body-md text-on-surface focus:ring-2 focus:ring-primary focus:border-transparent outline-none cursor-pointer appearance-none pr-10 min-w-[160px]">
                        <option value="">Semua Media</option>
                        <option value="image">Foto</option>
                        <option value="video">Video</option>
                        <option value="document">Dokumen</option>
                    </select>

                    <div class="relative flex items-center bg-surface border border-outline-variant rounded-lg h-11 px-4 cursor-pointer group hover:border-primary transition-colors">
                        <span class="material-symbols-outlined text-on-surface-variant mr-2 text-[20px] group-hover:text-primary transition-colors">
                            calendar_today
                        </span>
                        <span class="font-body-md text-on-surface select-none">
                            Pilih Tanggal
                        </span>
                    </div>
                </div>

                {{-- Grid / Table Toggle --}}
                <div class="flex items-center gap-1 bg-surface-container-low p-1 rounded-lg border border-outline-variant">
                    <button class="p-1.5 rounded-md bg-surface shadow-sm text-primary transition-all flex items-center justify-center" id="view-grid">
                        <span class="material-symbols-outlined text-[20px]">
                            grid_view
                        </span>
                    </button>
                    <button class="p-1.5 rounded-md text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all flex items-center justify-center" id="view-table">
                        <span class="material-symbols-outlined text-[20px]">
                            view_list
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>


    {{-- Grid Dokumentasi --}}
    <div class="px-margin-page pb-unit-xl flex-1 relative z-10">

        <div id="grid-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 transition-opacity duration-300">

            {{-- Dokumentasi 1 --}}
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-md transition-all duration-300 flex flex-col h-full border border-outline-variant">
                <div class="relative aspect-video w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPWDFLecW3rCZRkuNFz6twsr2wwGMu7rj0FOhwUhTfbZg9cfEUZE70z0wanqfkwlw6L4HZLcP18Uc4zeysWhl07BoDU6Dsq8Ao9sb1W-k7UZAGxF23gVGdLkUqSWwQcPQSGno3Elp2qRQ-cVlgfEmKRZxkqQqST0qadiktWeiAJ3Tg2Ru2djG9NNgK5zpnINJg_9TQaV8rAY5hmigESPg5ItmAJSdOjKKabBMq6v6R5tyzCxBH3O-Y_w"
                         alt="Dokumentasi akar mangrove">
                    <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-sm px-2 py-1 rounded text-white flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">image</span>
                        <span class="font-label-md text-xs">JPG</span>
                    </div>
                </div>

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-title-lg text-title-lg text-on-surface line-clamp-1 group-hover:text-primary transition-colors pr-2">
                            Akar_Napas_Rhizopho
                        </h3>
                        <button class="text-on-surface-variant hover:text-on-surface transition-colors flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">more_vert</span>
                        </button>
                    </div>

                    <p class="font-label-md text-label-md text-primary tracking-wider uppercase mb-4">
                        Konservasi Mangrove
                    </p>

                    <div class="mt-auto flex justify-between items-center pt-2">
                        <span class="font-body-md text-on-surface-variant text-sm">
                            24 Okt 2023
                        </span>
                        <span class="font-label-md bg-primary-fixed/30 text-primary-fixed-dim px-2 py-0.5 rounded-md text-xs font-semibold">
                            Publik
                        </span>
                    </div>
                </div>
            </div>

            {{-- Dokumentasi 2 --}}
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-md transition-all duration-300 flex flex-col h-full border border-outline-variant">
                <div class="relative aspect-video w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOuQfd298AFy5TaLywbcORk55tWQisFFGZDmiuoDmoUVfCvfgnwRX-pX8fY5vZpx31EwxHMWxIrky-nwcffmHfaOZrp6Mb3mmj9jtk-16qtKLbwWKopJ8oejkfvB0jIwc0Rl33MiH7BRZMXMeAH60fraNd1Q-6qvrMMXqVoSSFK5xWqhjH33zgJZHPMJrTUK0gGrpScOSkl7oIkIeYSaGszFAlGrHXSQlSBzKoP26WICBUbkx2MpR6kw"
                         alt="Dokumentasi solar panel">
                    <div class="absolute inset-0 flex items-center justify-center bg-black/10">
                        <div class="w-12 h-12 rounded-full bg-black/40 backdrop-blur flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                        </div>
                    </div>
                    <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-sm px-2 py-1 rounded text-white flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">movie</span>
                        <span class="font-label-md text-xs">MP4</span>
                    </div>
                    <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm px-2 py-1 rounded text-white text-xs font-label-md shadow-sm">
                        03:45
                    </div>
                </div>

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-title-lg text-title-lg text-on-surface line-clamp-1 group-hover:text-primary transition-colors pr-2">
                            Drone_Solar_Array_Fin
                        </h3>
                        <button class="text-on-surface-variant hover:text-on-surface transition-colors flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">more_vert</span>
                        </button>
                    </div>

                    <p class="font-label-md text-label-md text-primary tracking-wider uppercase mb-4">
                        Solar Panel CSR
                    </p>

                    <div class="mt-auto flex justify-between items-center pt-2">
                        <span class="font-body-md text-on-surface-variant text-sm">
                            22 Okt 2023
                        </span>
                        <span class="font-label-md bg-secondary-container/50 text-on-secondary-container px-2 py-0.5 rounded-md text-xs font-semibold">
                            Internal
                        </span>
                    </div>
                </div>
            </div>

            {{-- Dokumentasi 3 --}}
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-md transition-all duration-300 flex flex-col h-full border border-outline-variant">
                <div class="relative aspect-video w-full overflow-hidden bg-surface-container flex items-center justify-center bg-gray-100">
                    <span class="material-symbols-outlined text-[64px] text-gray-400">
                        picture_as_pdf
                    </span>
                    <div class="absolute top-3 left-3 bg-gray-200/90 backdrop-blur-sm px-2 py-1 rounded text-gray-700 flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">description</span>
                        <span class="font-label-md text-xs">PDF</span>
                    </div>
                </div>

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-title-lg text-title-lg text-on-surface line-clamp-1 group-hover:text-primary transition-colors pr-2">
                            Laporan_Inventarisasi_
                        </h3>
                        <button class="text-on-surface-variant hover:text-on-surface transition-colors flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">more_vert</span>
                        </button>
                    </div>

                    <p class="font-label-md text-label-md text-primary tracking-wider uppercase mb-4">
                        Keanekaragaman Hayati
                    </p>

                    <div class="mt-auto flex justify-between items-center pt-2">
                        <span class="font-body-md text-on-surface-variant text-sm">
                            18 Okt 2023
                        </span>
                        <span class="font-label-md bg-error-container/30 text-on-error-container px-2 py-0.5 rounded-md text-xs font-semibold">
                            Rahasia
                        </span>
                    </div>
                </div>
            </div>

            {{-- Dokumentasi 4 --}}
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm group hover:shadow-md transition-all duration-300 flex flex-col h-full border border-outline-variant">
                <div class="relative aspect-video w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBn43xekM-OeXZXOQFJcdCrcijyLixJe1xnZV3CmRnEWrlEihDBeyqM5VKxLZMzlP7NdmUnLdbwPO9tTIzHfb-xmSNieYS997oVBNPJ1v05N3n0gTIg93kpDstJ4bRNoVOTZRjjyVPExKKsNKErupfK-EeJFDbpMmETfLijF6lRTuywm9ZNP2RXMYX5P5hO7LVqGrLZT55FIAUrz4cxhv-AZUNBe3B1U1865ZT4adMKJXs0VcNSfUrvbw"
                         alt="Dokumentasi fauna ikan glodok">
                    <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-sm px-2 py-1 rounded text-white flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">image</span>
                        <span class="font-label-md text-xs">JPG</span>
                    </div>
                </div>

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="font-title-lg text-title-lg text-on-surface line-clamp-1 group-hover:text-primary transition-colors pr-2">
                            Fauna_Ikan_Glodok_Ma
                        </h3>
                        <button class="text-on-surface-variant hover:text-on-surface transition-colors flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">more_vert</span>
                        </button>
                    </div>

                    <p class="font-label-md text-label-md text-primary tracking-wider uppercase mb-4">
                        Keanekaragaman Hayati
                    </p>

                    <div class="mt-auto flex justify-between items-center pt-2">
                        <span class="font-body-md text-on-surface-variant text-sm">
                            15 Okt 2023
                        </span>
                        <span class="font-label-md bg-primary-fixed/30 text-primary-fixed-dim px-2 py-0.5 rounded-md text-xs font-semibold">
                            Publik
                        </span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Table View (Tetap Dipertahankan) --}}
        <!-- Pastikan menyertakan kode #table-view persis seperti yang Anda miliki sebelumnya di sini -->
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

    const setActiveButton = (activeBtn, inactiveBtn) => {
        activeBtn.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-high');
        activeBtn.classList.add('bg-surface', 'shadow-sm', 'text-primary');
        inactiveBtn.classList.add('text-on-surface-variant', 'hover:bg-surface-container-high');
        inactiveBtn.classList.remove('bg-surface', 'shadow-sm', 'text-primary');
    };

    if(btnTable && btnGrid) {
        btnTable.addEventListener('click', () => {
            setActiveButton(btnTable, btnGrid);
            viewGrid.classList.add('opacity-0');
            setTimeout(() => {
                viewGrid.classList.add('hidden');
                if (viewTable) {
                    viewTable.classList.remove('hidden');
                    setTimeout(() => viewTable.classList.remove('opacity-0'), 50);
                }
            }, 300);
        });

        btnGrid.addEventListener('click', () => {
            setActiveButton(btnGrid, btnTable);
            if (viewTable) viewTable.classList.add('opacity-0');
            setTimeout(() => {
                if (viewTable) viewTable.classList.add('hidden');
                viewGrid.classList.remove('hidden');
                setTimeout(() => viewGrid.classList.remove('opacity-0'), 50);
            }, 300);
        });
    }
});
</script>
@endpush