@extends('layouts.app')

@section('title', 'Silvo Fishery — Panen Jalan, Mangrove Tetap Berdiri | KRM Surabaya')
@php($active = 'program')

@section('content')

    <x-hero
        image="assets/Silvo Fishery.jpg"
        title="Silvo Fishery: Panen Jalan, Mangrove Tetap Berdiri"
        description="Sistem tambak yang menyisakan sabuk mangrove di sekeliling petak air — akar mangrove menyaring air tambak dan menahan abrasi, sementara petani tetap memanen udang, bandeng, dan kepiting dari petak yang sama."
        primaryLabel="Lihat Siklus Budidaya"
        primaryUrl="#siklus"
        secondaryLabel="Bandingkan dengan Tambak Biasa"
        secondaryUrl="#perbandingan"
    >
        <div class="krm-card-plain" style="margin-top:40px;background:rgba(255,255,255,0.06);border-color:rgba(255,255,255,0.2);" data-animate="fade-up">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                <span class="fw-semibold" style="color:#fff;font-size:0.82rem;letter-spacing:.04em;">RASIO LAHAN: SABUK MANGROVE &amp; PETAK TAMBAK</span>
                <span class="small" style="color:rgba(255,255,255,0.7);">PRINSIP ZONASI SILVOFISHERY</span>
            </div>
            <div class="krm-ratio-bar">
                <span style="width:30%;background-color:var(--krm-emerald-light);">30%</span>
                <span style="width:70%;background-color:#2f6f8f;">70%</span>
            </div>
            <div class="d-flex gap-4 small" style="color:rgba(255,255,255,0.75);">
                <span><i class="fa-solid fa-square me-1" style="color:var(--krm-emerald-light);"></i> Sabuk Mangrove</span>
                <span><i class="fa-solid fa-square me-1" style="color:#2f6f8f;"></i> Petak Tambak</span>
            </div>
        </div>
    </x-hero>

    <section id="siklus" style="padding-top: 88px;">
        <div class="container">
            <span class="krm-section-eyebrow">SIKLUS BUDIDAYA</span>
            <h2 class="krm-section-title">Satu petak, satu siklus yang terus berulang.</h2>
            <p class="krm-muted mb-4" style="max-width:760px;">Berbeda dari proses satu arah, budidaya silvofishery berjalan sebagai siklus musiman — begitu panen selesai, petak disiapkan kembali untuk tebar benih berikutnya, sementara mangrove di pematang terus tumbuh menopang setiap putaran.</p>

            <x-step-list
                :steps="[
                    ['title' => 'Penyerapan Cahaya', 'desc' => 'Pematang diperiksa, sabuk mangrove dirawat, kualitas air disesuaikan.'],
                    ['title' => 'Tebar Benih', 'desc' => 'Benih udang, bandeng, atau kepiting ditebar sesuai kepadatan petak.'],
                    ['title' => 'Pemeliharaan', 'desc' => 'Mangrove menyaring air masuk sekaligus menjadi tempat pakan alami tumbuh.'],
                    ['title' => 'Panen', 'desc' => 'Hasil dipanen bertahap, lalu petak disiapkan untuk siklus berikutnya.'],
                ]"
                title=""
                eyebrow=""
            />
        </div>
    </section>

    <section>
        <div class="container">
            <span class="krm-section-eyebrow">KOMODITAS POLIKULTUR</span>
            <h2 class="krm-section-title">Satu petak, beberapa jenis hasil panen.</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="krm-card-plain h-100">
                        <span class="krm-program-card__icon"><i class="fa-solid fa-shrimp"></i></span>
                        <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Udang Windu</h3>
                        <p class="krm-muted small mb-0">Komoditas utama dengan nilai jual tinggi di petak tambak.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="krm-card-plain h-100">
                        <span class="krm-program-card__icon"><i class="fa-solid fa-fish-fins"></i></span>
                        <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Bandeng</h3>
                        <p class="krm-muted small mb-0">Tahan terhadap fluktuasi kualitas air di sekitar sabuk mangrove.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="krm-card-plain h-100">
                        <span class="krm-program-card__icon"><i class="fa-solid fa-tree"></i></span>
                        <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Mangrove Pematang</h3>
                        <p class="krm-muted small mb-0">Ditanam dan dirawat di sekeliling petak, bukan komoditas panen.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="perbandingan">
        <div class="container">
            <div class="krm-table-wrap">
                <table class="krm-table">
                    <thead>
                        <tr><th>Aspek</th><th>Silvofishery</th><th>Tambak Konvensional</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Sabuk Mangrove</td><td>Dipertahankan &amp; dirawat</td><td>Umumnya dibabat habis</td></tr>
                        <tr><td>Kualitas Air</td><td>Tersaring alami oleh akar</td><td>Bergantung penuh pada aerator</td></tr>
                        <tr><td>Ketahanan Abrasi</td><td>Tinggi</td><td>Rendah</td></tr>
                        <tr><td>Hasil Panen</td><td>Stabil, jangka panjang</td><td>Cepat, rentan gagal panen</td></tr>
                        <tr><td>Dampak Lingkungan</td><td>Mendukung konservasi</td><td>Berisiko merusak ekosistem</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="krm-card-plain" data-animate="fade-up">
                <span class="krm-section-eyebrow">DATA &amp; CAPAIAN SILVO FISHERY</span>
                <h2 class="krm-section-title">Luas Petak Aktif</h2>
                <div class="d-flex flex-column gap-3">
                    <div>
                        <div class="d-flex justify-content-between small fw-semibold" style="color:var(--krm-forest);"><span>Luas Petak Aktif</span></div>
                        <div class="krm-ratio-bar"><span style="width:78%;background-color:var(--krm-emerald);"></span></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between small fw-semibold" style="color:var(--krm-forest);"><span>Cakupan Sabuk Mangrove</span></div>
                        <div class="krm-ratio-bar"><span style="width:64%;background-color:var(--krm-emerald);"></span></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between small fw-semibold" style="color:var(--krm-forest);"><span>Hasil Panen Terakhir</span></div>
                        <div class="krm-ratio-bar"><span style="width:88%;background-color:var(--krm-emerald);"></span></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between small fw-semibold" style="color:var(--krm-forest);"><span>Kualitas Air (Indeks)</span></div>
                        <div class="krm-ratio-bar"><span style="width:92%;background-color:var(--krm-emerald);"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-about-strip
        image="assets/Home2.jpg"
        :related="[
            ['icon' => 'fa-sun', 'title' => 'Biodiversitas Mangrove', 'desc' => 'Koleksi spesies mangrove yang tumbuh di kawasan KRM.', 'url' => route('biodiversitas')],
            ['icon' => 'fa-right-left', 'title' => 'Produk Olahan Mangrove', 'desc' => 'Hasil olahan komunitas dari buah dan daun mangrove.', 'url' => route('produk-olahan')],
        ]"
    />

@endsection