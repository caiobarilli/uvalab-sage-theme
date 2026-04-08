<div class="swiper slider-{{ $type }} w-full">
    <div class="slider-hero__bg-shape">
        <div class="slider-hero__bg-shape-inner">
            <svg width="436" height="720" viewBox="0 0 436 720" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask-hero-bg" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="436"
                    height="720">
                    <path d="M43.519 0H435.19L391.671 720H0L43.519 0" fill="black" />
                </mask>
                <g mask="url(#mask-hero-bg)">
                    <rect width="435.19" height="720" fill="#E2E2E2" />
                </g>
            </svg>
        </div>
    </div>
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                {!! $slide['content'] !!}
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
