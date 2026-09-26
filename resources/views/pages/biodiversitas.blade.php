@extends('layouts.app')

{{-- 1. Ambil data Program ID 5 beserta relasi kontennya --}}
@php
    // Gunakan 'with' agar query lebih optimal (Eager Loading)
    $program = \App\Models\Program::with('contents')->find(5); 
    $active = 'biodiversitas';
@endphp

@section('title', $program->judul . ' — KRM Surabaya')

@section('content')

    {{-- 2. Hero Component menggunakan data Program utama --}}
    <x-hero
        :image="'assets/' . $program->gambar_utama"
        :title="$program->judul"
        :description="$program->deskripsi"
        primaryLabel="Lihat Program Kami"
        :primaryUrl="route('program')"
        secondaryLabel="Produk Olahan"
        :secondaryUrl="route('produk-olahan')"
    />

    {{-- Info bar tetap statis atau bisa Anda dinamiskan juga nanti jika perlu --}}
    <x-info-bar :items="[
        ['label' => 'TOTAL SPESIES FLORA', 'value' => '42+'],
        ['label' => 'AREA KONSERVASI INTI', 'value' => '156 Ha'],
        ['label' => 'INDEKS KEANEKARAGAMAN', 'value' => '2,84'],
        ['label' => 'SPESIES FAUNA TERCATAT', 'value' => '68+'],
    ]" />

    <section style="padding-top: 96px;">
        <div class="container d-flex flex-column gap-5">

            {{-- 3. Looping data dari tabel program_contents --}}
            @foreach($program->contents as $content)
                <div class="krm-split" data-animate="fade-up">
                    
                    {{-- Logika agar layout gambar selang-seling (Kiri - Kanan - Kiri) --}}
                    @if($loop->even)
                        {{-- Layout Genap (Ke-2, Ke-4, dst): Teks di kiri, Gambar di kanan --}}
                        <div class="order-2 order-md-1">
                            <h2 class="krm-section-title">{{ $content->judul }}</h2>
                            <p class="krm-muted">{{ $content->deskripsi }}</p>
                        </div>
                        <div class="krm-split__image order-1 order-md-2 krm-card-plain p-0" style="overflow:hidden;">
                            <img src="{{ asset('assets/' . $content->gambar) }}" 
                                 alt="{{ $content->judul }}" 
                                 loading="lazy" 
                                 style="width:100%;height:320px;object-fit:cover;display:block;">
                        </div>
                    @else
                        {{-- Layout Ganjil (Ke-1, Ke-3, dst): Gambar di kiri, Teks di kanan --}}
                        <div class="krm-split__image krm-card-plain p-0" style="overflow:hidden;">
                            <img src="{{ asset('assets/' . $content->gambar) }}" 
                                 alt="{{ $content->judul }}" 
                                 loading="lazy" 
                                 style="width:100%;height:320px;object-fit:cover;display:block;">
                        </div>
                        <div>
                            <h2 class="krm-section-title">{{ $content->judul }}</h2>
                            <p class="krm-muted">{{ $content->deskripsi }}</p>
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    </section>

    <x-about-strip 
        image="assets/Home2.jpg"
        :related="[
            ['icon' => 'fa-fish', 'title' => 'Silvo Fishery', 'desc' => 'Budidaya tambak yang tetap menjaga sabuk mangrove hidup.', 'url' => route('silvo-fishery')],
            ['icon' => 'fa-basket-shopping', 'title' => 'Produk Olahan Mangrove', 'desc' => 'Hasil olahan komunitas dari buah dan daun mangrove.', 'url' => route('produk-olahan')],
        ]" 
    />

@endsection