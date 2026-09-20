@extends('layouts.app')

@section('title', 'Produk Olahan Mangrove — Kebaikan Alam dalam Setiap Olahan')
@php($active = 'produk-olahan')

@section('content')

    <x-hero
        image="assets/Produk Olahan Hero.jpg"
        title="Kebaikan Alam dalam Setiap Olahan"
        description="Mendukung perekonomian lokal melalui pemanfaatan berkelanjutan hasil hutan mangrove. Temukan berbagai produk unik dan bermanfaat dari komunitas pesisir kami."
        primaryLabel="Unduh Laporan"
        primaryUrl="#"
    />

    <section style="padding-top: 40px;">
        <div class="container d-flex flex-column gap-4">

            <div class="krm-card-plain krm-split" data-animate="fade-up" style="align-items: stretch;">
                <div class="krm-split__image" style="min-height:260px;">
                    <img src="{{ asset('assets/Produk Olahan 1.jpg') }}" alt="Ragam jamu bubuk dan sirup mangrove" loading="lazy" style="height:100%;">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <span class="krm-section-eyebrow">PALING DIMINATI</span>
                    <h2>Ragam Minuman Kesehatan Alami &amp; Sirup Segar</h2>
                    <p>Menyediakan pilihan terbaik untuk kesehatan Anda. Tersedia aneka jamu bubuk instan yang praktis dan penuh khasiat, seperti Temulawak Madu, Jahe Anget, dan Kunir Asem.</p>
                    <p>Sirup Mangrove Bogem (Sonneratia caseolaris). Sirup khas ini kaya akan vitamin C dan antioksidan alami, menawarkan kesegaran tropis unik dengan perpaduan rasa asam manis yang pas. Semua produk dibuat dari bahan alam pilihan yang dijamin kualitasnya.</p>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3">
                        <strong style="font-size:1.3rem;color:var(--krm-forest);">Rp 35.000</strong>
                        <a href="{{ route('hubungi-kami') }}" class="btn krm-btn krm-btn--primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="krm-card-plain krm-split" data-animate="fade-up" style="align-items: stretch;">
                <div class="d-flex flex-column justify-content-center order-2 order-md-1">
                    <span class="krm-section-eyebrow">PALING DIMINATI</span>
                    <h2>Olahan Mangrove Khas &amp; Bernilai Lokal</h2>
                    <p>Nikmati beragam olahan mangrove pilihan, mulai dari Stick Mangrove yang crispy dan gurih hingga aneka camilan mangrove kering dengan cita rasa khas. Diolah dari bahan alam pilihan dengan mengutamakan kualitas, KRM menghadirkan produk lokal yang lezat sekaligus memiliki nilai tambah bagi masyarakat dan lingkungan.</p>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <strong style="font-size:1.3rem;color:var(--krm-forest);">Rp 25.000</strong>
                        <a href="{{ route('hubungi-kami') }}" class="btn krm-btn krm-btn--primary">Beli Sekarang</a>
                    </div>
                </div>
                <div class="krm-split__image order-1 order-md-2" style="min-height:260px;">
                    <img src="{{ asset('assets/Produk Olahan 2.jpg') }}" alt="Kemasan camilan olahan mangrove" loading="lazy" style="height:100%;">
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="krm-card-plain krm-split" data-animate="fade-up">
                <div>
                    <h2 class="krm-section-title">Mengapa Memilih Produk Kami?</h2>
                    <p class="krm-muted mb-4">Setiap pembelian Anda tidak hanya memberikan produk berkualitas, tetapi juga mendukung keberlanjutan ekosistem dan kesejahteraan warga sekitar.</p>

                    <div class="row g-4">
                        <div class="col-6">
                            <span class="krm-feature-grid__icon"><i class="fa-solid fa-shield-heart"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Kaya Manfaat Alami</h3>
                            <p class="krm-muted small mb-0">Kandungan gizi tinggi tanpa bahan pengawet sintetis.</p>
                        </div>
                        <div class="col-6">
                            <span class="krm-feature-grid__icon"><i class="fa-solid fa-people-group"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Pemberdayaan Warga</h3>
                            <p class="krm-muted small mb-0">Membuka lapangan kerja bagi ibu-ibu rumah tangga pesisir.</p>
                        </div>
                        <div class="col-6">
                            <span class="krm-feature-grid__icon"><i class="fa-solid fa-recycle"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Zero Waste</h3>
                            <p class="krm-muted small mb-0">Memanfaatkan bagian tanaman yang sebelumnya terbuang.</p>
                        </div>
                    </div>
                </div>
                <div class="krm-split__image position-relative">
                    <img src="{{ asset('assets/Produk_Olahan_Mangrove.png') }}" alt="Warga pesisir mengolah kerajinan mangrove" loading="lazy" style="height:320px;">
                </div>
            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <h2 class="krm-section-title mx-auto" style="max-width:640px;">Tertarik dengan Produk Kami?</h2>
            <p class="krm-muted mx-auto" style="max-width:560px;">Kunjungi pusat oleh-oleh kami di area Kebun Raya Mangrove atau pesan secara online melalui mitra resmi kami.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="{{ route('hubungi-kami') }}" class="btn krm-btn krm-btn--primary" style="background-color:var(--krm-forest);"><i class="fa-solid fa-store"></i> Kunjungi Toko Fisik</a>
                <a href="https://wa.me/6231100000" target="_blank" rel="noopener" class="btn krm-btn krm-btn--outline" style="color:var(--krm-forest);border-color:var(--krm-forest);"><i class="fa-brands fa-whatsapp"></i> Pesan via WhatsApp</a>
            </div>
            <p class="krm-muted small mt-3">Tersedia layanan pesan antar untuk area Surabaya dan sekitarnya.</p>
        </div>
    </section>

@endsection