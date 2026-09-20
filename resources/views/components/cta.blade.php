@props([
    'eyebrow' => 'KUNJUNGI FASILITAS',
    'title' => 'Lihat langsung reaktor pirolisis di kawasan KRM.',
    'description' => 'Jadwalkan kunjungan edukasi atau riset untuk melihat proses pirolisis secara langsung di lapangan.',
    'primaryLabel' => 'Jadwalkan Kunjungan',
    'primaryUrl' => null,
    'secondaryLabel' => 'Lihat Program Lain',
    'secondaryUrl' => null,
])

<section class="krm-cta">
    <div class="container">
        <div class="krm-cta__box" data-animate="fade-up">
            <div class="krm-cta__text">
                <span class="krm-cta__eyebrow">{{ $eyebrow }}</span>
                <h2 class="krm-cta__title">{{ $title }}</h2>
                <p class="krm-cta__desc">{{ $description }}</p>
            </div>
            <div class="krm-cta__actions">
                <a href="{{ $primaryUrl ?? route('hubungi-kami') }}" class="btn krm-btn krm-btn--amber">{{ $primaryLabel }} <i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ $secondaryUrl ?? route('program') }}" class="krm-cta__link">{{ $secondaryLabel }}</a>
            </div>
        </div>
    </div>
</section>