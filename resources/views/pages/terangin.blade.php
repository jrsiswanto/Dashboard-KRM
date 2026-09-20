@extends('layouts.app')

@section('title', 'Terangin — Penerangan Energi Angin Pesisir | KRM Surabaya')
@php($active = 'program')

@section('content')

    <x-hero
        image="assets/Terangin Hero.jpg"
        title="Terangin: Penerangan Energi Angin Pesisir"
        description="Inovasi pembangkit listrik tenaga angin mandiri yang memanfaatkan hembusan angin pesisir pantai utara Surabaya untuk mendukung penerangan dan operasional kawasan secara ramah lingkungan."
        primaryLabel="Lihat Fasilitas"
        primaryUrl="#fasilitas"
    />

    <section id="fasilitas" style="padding-top: 64px;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                <h2 class="krm-section-title krm-mb-0">Modul &amp; Fasilitas Terangin</h2>
                <a href="{{ route('program') }}" class="krm-program-card__link">Lihat Semua Program <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                {{-- Modul 1 --}}
                <div class="col-md-6">
                    <div class="krm-card-plain h-100 p-0" style="overflow:hidden;">
                        <div style="position:relative;">
                            <img src="{{ asset('assets/Terangin 1.jpg') }}" alt="Modul anatomi dan fisiologi mangrove" loading="lazy" style="width:100%;height:220px;object-fit:cover;display:block;">
                            <span class="badge-soft" style="position:absolute;top:16px;left:16px;background:#fff;border-radius:6px;padding:4px 10px;">Dasar</span>
                        </div>
                        <div class="p-4">
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Anatomi &amp; Fisiologi Mangrove</h3>
                            <p class="krm-muted small">Pelajari struktur unik akar napas dan adaptasi luar biasa mangrove.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="krm-muted small"><i class="fa-regular fa-clock"></i> 45 Menit</span>
                                <a href="#" class="fw-bold" style="color:var(--krm-emerald);text-decoration:none;">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modul 2 --}}
                <div class="col-md-6">
                    <div class="krm-card-plain h-100 p-0" style="overflow:hidden;">
                        <div style="position:relative;">
                            <img src="{{ asset('assets/Terangin 2.jpg') }}" alt="Penerangan Energi Angin Pesisir Terangin" loading="lazy" style="width:100%;height:220px;object-fit:cover;display:block;">
                            <span class="badge-soft" style="position:absolute;top:16px;left:16px;background:#fff;border-radius:6px;padding:4px 10px;">Menengah</span>
                        </div>
                        <div class="p-4">
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Penerangan Energi Angin Pesisir</h3>
                            <p class="krm-muted small">Eksplorasi pemanfaatan kincir angin terpadu untuk penerangan kawasan konservasi.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="krm-muted small"><i class="fa-regular fa-clock"></i> 60 Menit</span>
                                <a href="#" class="fw-bold" style="color:var(--krm-emerald);text-decoration:none;">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="krm-card-plain" data-animate="fade-up">
                <h2 class="h5 fw-bold mb-3" style="color:var(--krm-forest);"><i class="fa-regular fa-calendar me-2"></i>Jadwal Kegiatan</h2>

                <div class="krm-timeline-item">
                    <div>
                        <strong style="display:block;color:var(--krm-forest);">Eksplorasi Jalur Kayu</strong>
                        <span class="krm-muted small">24 Okt 2026 &bull; 08:00 – 11:00 WIB &bull; Zona Utara</span>
                    </div>
                    <span class="badge-soft">Tur Sekolah</span>
                </div>
                <div class="krm-timeline-item">
                    <div>
                        <strong style="display:block;color:var(--krm-forest);">Pembibitan Mangrove</strong>
                        <span class="krm-muted small">26 Okt 2026 &bull; 13:00 – 15:00 WIB &bull; Pusat Konservasi</span>
                    </div>
                    <span class="badge-soft">Workshop</span>
                </div>
                <div class="krm-timeline-item krm-mb-0">
                    <div>
                        <strong style="display:block;color:var(--krm-forest);">Peran Mangrove Cegah Abrasi</strong>
                        <span class="krm-muted small">1 Nov 2026 &bull; 19:00 – 20:30 WIB &bull; Online via Zoom</span>
                    </div>
                    <span class="badge-soft">Webinar</span>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4 p-3" style="background:var(--krm-off-white);border-radius:var(--krm-radius-sm);">
                    <div>
                        <strong style="color:var(--krm-forest);">Rencanakan Kunjungan Edukasi</strong>
                        <p class="krm-muted small mb-0">Booking sesi khusus untuk institusi pendidikan Anda.</p>
                    </div>
                    <a href="{{ route('hubungi-kami') }}" class="btn krm-btn krm-btn--primary" style="background-color:var(--krm-forest);">Reservasi Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <div class="krm-card-plain mx-auto" style="max-width:760px;background:var(--krm-off-white);">
                <h2 class="h5 fw-bold" style="color:var(--krm-forest);">Mitra Pendidikan Kami</h2>
                <p class="krm-muted">Bergabunglah dengan puluhan institusi yang telah menjadikan Kebun Raya Mangrove sebagai laboratorium alam terbuka untuk kurikulum mereka.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
                    @for ($i = 0; $i < 4; $i++)
                        <span style="width:60px;height:60px;border-radius:10px;background:#fff;border:1px solid var(--krm-border);display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-graduation-cap krm-muted"></i>
                        </span>
                    @endfor
                </div>
            </div>
        </div>
    </section>

@endsection