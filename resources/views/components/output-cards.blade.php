@props([
    'items' => [],
])

<div class="krm-output-cards">
    @foreach($items as $item)
        <div class="krm-output-card" data-animate="fade-up">
            <div class="krm-output-card__image">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy">
            </div>
            <h3>{{ $item['title'] }}</h3>
            <p>{{ $item['desc'] }}</p>
        </div>
    @endforeach
</div>