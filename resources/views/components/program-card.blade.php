@props([
    'icon' => 'fa-bolt',
    'title' => '',
    'description' => '',
    'url' => '#',
])

<div class="krm-program-card" data-animate="fade-up">
    <span class="krm-program-card__icon"><i class="fa-solid {{ $icon }}"></i></span>
    <h3 class="krm-program-card__title">{{ $title }}</h3>
    <p class="krm-program-card__desc">{{ $description }}</p>
    <a href="{{ $url }}" class="krm-program-card__link">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
</div>