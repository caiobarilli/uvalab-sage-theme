<div class="swiper slider-{{ $type }} w-full">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                {!! $slide['content'] !!}
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
