@props([
    'image' => 'assets/Home.jpg',
    'eyebrow' => null,
    'title' => '',
    'highlight' => null,
    'description' => '',
    'primaryLabel' => null,
    'primaryUrl' => '#',
    'secondaryLabel' => null,
    'secondaryUrl' => '#',
])

<section class="krm-hero" style="background-image: linear-gradient(180deg, rgba(4,26,20,.55) 0%, rgba(4,26,20,.72) 55%, rgba(4,26,20,.92) 100%), url('{{ asset($image) }}');">
    <div class="container">
        <div class="krm-hero__content" data-animate="fade-up">
            @if($eyebrow)
                <span class="krm-hero__eyebrow">{{ $eyebrow }}</span>
            @endif

            <h1 class="krm-hero__title">
                @if($highlight)
                    {!! str_replace($highlight, '<span class="krm-hero__highlight">'.$highlight.'</span>', e($title)) !!}
                @else
                    {{ $title }}
                @endif
            </h1>

            <p class="krm-hero__desc">{{ $description }}</p>

            @if($primaryLabel || $secondaryLabel)
                <div class="krm-hero__actions">
                    @if($primaryLabel)
                        <a href="{{ $primaryUrl }}" class="btn krm-btn krm-btn--primary">{{ $primaryLabel }} <i class="fa-solid fa-arrow-right"></i></a>
                    @endif
                    @if($secondaryLabel)
                        <a href="{{ $secondaryUrl }}" class="btn krm-btn krm-btn--outline">{{ $secondaryLabel }} <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    @endif
                </div>
            @endif
        </div>

        {{ $slot ?? '' }}
    </div>
</section>