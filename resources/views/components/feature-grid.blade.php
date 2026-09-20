@props([
    'title' => 'Kenapa program ini penting bagi kawasan.',
    'features' => [],
])

<section class="krm-feature-grid">
    <div class="container">
        <div class="krm-feature-grid__box" data-animate="fade-up">
            <h2 class="krm-section-title">{{ $title }}</h2>
            <div class="krm-feature-grid__items">
                @foreach($features as $f)
                    <div class="krm-feature-grid__item">
                        <span class="krm-feature-grid__icon"><i class="fa-solid {{ $f['icon'] }}"></i></span>
                        <h3>{{ $f['title'] }}</h3>
                        <p>{{ $f['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>