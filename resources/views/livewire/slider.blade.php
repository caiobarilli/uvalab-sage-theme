<div class="swiper slider-{{ $type }} w-full bg-gray-100">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                <div class="grid grid-cols-2 min-h-[600px]">
                    <div class="flex flex-col justify-center px-16 py-12">
                        <span class="text-sm text-gray-500 mb-2">{{ $slide['subtitle'] }}</span>
                        <h1 class="text-5xl font-serif font-bold text-gray-900 leading-tight mb-6">
                            {{ $slide['title'] }}
                        </h1>
                        <p class="text-gray-600 mb-8 max-w-md">
                            {{ $slide['description'] }}
                        </p>
                        <a href="{{ $slide['button_url'] }}"
                            class="inline-block bg-[#7a1c2e] text-white px-8 py-4 w-fit hover:bg-[#621525] transition-colors">
                            {{ $slide['button_label'] }}
                        </a>
                    </div>
                    <div class="flex items-center justify-center bg-gray-50">
                        <img src="{{ $slide['image_url'] }}" alt="{{ $slide['title'] }}"
                            class="max-h-[500px] object-contain">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
