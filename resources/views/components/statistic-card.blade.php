@props([
    'icon' => 'fa-leaf',
    'value' => '',
    'unit' => null,
    'label' => '',
    'sublabel' => null,
    'live' => false,
])

<div class="krm-stat-card" data-animate="fade-up">
    <div class="krm-stat-card__top">
        <span class="krm-stat-card__icon"><i class="fa-solid {{ $icon }}"></i></span>
        @if($live)
            <span class="krm-stat-card__live">Live</span>
        @endif
    </div>
    <p class="krm-stat-card__label">{{ $label }}</p>
    <p class="krm-stat-card__value">{{ $value }} @if($unit)<span>{{ $unit }}</span>@endif</p>
    @if($sublabel)
        <p class="krm-stat-card__sublabel">{{ $sublabel }}</p>
    @endif
</div>