@props([
    'items' => [],
])

<section class="krm-info-bar">
    <div class="container">
        <div class="krm-info-bar__grid">
            @foreach($items as $item)
                <div class="krm-info-bar__item" data-animate="fade-up">
                    <span class="krm-info-bar__label">{{ $item['label'] }}</span>
                    <span class="krm-info-bar__value">{{ $item['value'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>