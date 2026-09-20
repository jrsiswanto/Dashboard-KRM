@props([
    'image' => 'assets/Home2.jpg',
    'related' => [],
])

<section class="krm-about">
    <div class="container">
        <div class="krm-about__card" data-animate="fade-up">
            <span class="krm-about__eyebrow">TENTANG KRM SURABAYA</span>
            <h2 class="krm-about__title">Ekosistem Hidup di Jantung <span class="krm-about__title-accent">Pesisir Utara</span></h2>
            <p class="krm-about__desc">Kebun Raya Mangrove Surabaya adalah kawasan konservasi aktif seluas 30,2 hektare yang menjadi paru-paru hijau bagi Kota Surabaya. Dikelola secara profesional dengan pendekatan riset, edukasi, dan pemberdayaan masyarakat pesisir.</p>

            <div class="krm-about__stats">
                <div><strong>2009</strong><span>Tahun Berdiri</span></div>
                <div><strong>12.000+</strong><span>Pengunjung/Tahun</span></div>
                <div><strong>7</strong><span>Program Aktif</span></div>
                <div><strong>24+</strong><span>Mitra CSR</span></div>
            </div>

            <div class="krm-about__photo">
                <img src="{{ asset($image) }}" alt="Foto aerial kawasan Kebun Raya Mangrove Surabaya" loading="lazy">
            </div>

            @if(count($related))
                <div class="krm-about__related">
                    @foreach($related as $item)
                        <a href="{{ $item['url'] }}" class="krm-about__related-item">
                            <span class="krm-about__related-icon"><i class="fa-solid {{ $item['icon'] }}"></i></span>
                            <span>
                                <strong>{{ $item['title'] }}</strong>
                                <small>{{ $item['desc'] }}</small>
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>