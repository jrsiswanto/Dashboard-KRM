@extends('layouts.app')

@section('title', 'Koleksi Biodiversitas — Kekayaan Ekosistem Mangrove KRM Surabaya')
@php($active = 'biodiversitas')

@section('content')

    <x-hero
        image="assets/BioDiversitas Hero.jpg"
        title="Kekayaan Ekosistem Mangrove"
        description="Jelajahi keanekaragaman flora dan fauna yang hidup dan berkembang di kawasan Kebun Raya Mangrove Surabaya. Rumah bagi beragam spesies mangrove pelindung pesisir."
        primaryLabel="Lihat Program Kami"
        :primaryUrl="route('program')"
        secondaryLabel="Produk Olahan"
        :secondaryUrl="route('produk-olahan')"
    />

    <x-info-bar :items="[
        ['label' => 'TOTAL SPESIES FLORA', 'value' => '42+'],
        ['label' => 'AREA KONSERVASI INTI', 'value' => '156 Ha'],
        ['label' => 'INDEKS KEANEKARAGAMAN', 'value' => '2,84'],
        ['label' => 'SPESIES FAUNA TERCATAT', 'value' => '68+'],
    ]" />

    <section style="padding-top: 96px;">
        <div class="container d-flex flex-column gap-5">

            {{-- BioDiversitas 1: Rhizophora mucronata --}}
            <div class="krm-split" data-animate="fade-up">
                <div class="krm-split__image krm-card-plain p-0" style="overflow:hidden;">
                    <img src="{{ asset('assets/BioDiversitas 1.jpg') }}" alt="Rhizophora mucronata (Bakau Kurap)" loading="lazy" style="width:100%;height:320px;object-fit:cover;display:block;">
                </div>
                <div>
                    <h2 class="krm-section-title">Rhizophora mucronata (Bakau Kurap)</h2>
                    <p class="krm-muted">Spesies mangrove utama dengan sistem akar tunjang (stilt roots) yang kokoh dan rimbun. Perakarannya berfungsi memecah gelombang laut, menstabilkan sedimen lumpur, serta menyediakan tempat berlindung dan berkembang biak bagi biota pesisir seperti ikan dan kepiting.</p>
                </div>
            </div>

            {{-- BioDiversitas 2: Excoecaria agallocha --}}
            <div class="krm-split" data-animate="fade-up">
                <div class="order-2 order-md-1">
                    <h2 class="krm-section-title">Excoecaria agallocha (Kayu Buta-Buta)</h2>
                    <p class="krm-muted">Tanaman mangrove yang dikenal memiliki daya adaptasi dan ketahanan tinggi di zona pasang surut bagian dalam. Tajuk daunnya yang lebat berperan aktif sebagai benteng alami pelindung pesisir sekaligus penyerap karbon biru (blue carbon) yang sangat efektif.</p>
                </div>
                <div class="krm-split__image order-1 order-md-2 krm-card-plain p-0" style="overflow:hidden;">
                    <img src="{{ asset('assets/BioDiversitas 2.jpg') }}" alt="Excoecaria agallocha (Kayu Buta-Buta)" loading="lazy" style="width:100%;height:320px;object-fit:cover;display:block;">
                </div>
            </div>

            {{-- BioDiversitas 3: Avicennia marina --}}
            <div class="krm-split" data-animate="fade-up">
                <div class="krm-split__image krm-card-plain p-0" style="overflow:hidden;">
                    <img src="{{ asset('assets/BioDiversitas 3.jpg') }}" alt="Avicennia marina (Api-Api Putih)" loading="lazy" style="width:100%;height:320px;object-fit:cover;display:block;">
                </div>
                <div>
                    <h2 class="krm-section-title">Avicennia marina (Api-Api Putih)</h2>
                    <p class="krm-muted">Spesies pelopor yang mampu tumbuh di garis pantai paling depan dengan kadar garam tinggi. Dilengkapi sistem akar napas (pneumatophores) yang mencuat ke atas permukaan tanah untuk menyerap oksigen langsung dari udara serta menahan abrasi secara optimal.</p>
                </div>
            </div>

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