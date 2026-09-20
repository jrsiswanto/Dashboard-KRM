@props([
    'eyebrow' => 'CARA KERJA',
    'title' => '',
    'steps' => [],
])

<section class="krm-steps">
    <div class="container">
        @if($eyebrow)
            <span class="krm-section-eyebrow">{{ $eyebrow }}</span>
        @endif
        @if($title)
            <h2 class="krm-section-title">{{ $title }}</h2>
        @endif

        <div class="krm-steps__list">
            @foreach($steps as $i => $step)
                <div class="krm-steps__item" data-animate="fade-up">
                    <span class="krm-steps__number">{{ sprintf('%02d', $i + 1) }}</span>
                    <div>
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>