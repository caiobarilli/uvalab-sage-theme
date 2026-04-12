<div class="products-list">
    <div class="products-list__items">
        @forelse ($products as $product)
            <a href="{{ $product['permalink'] }}" class="products-list__card">
                <div class="products-list__image">
                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" />
                </div>
                <h3 class="products-list__title">{{ $product['title'] }}</h3>
                <div class="products-list__price">{!! $product['price'] !!}</div>
            </a>
        @empty
            <p class="products-list__empty">{{ __('No products found.', 'sage') }}</p>
        @endforelse
    </div>

    @if ($totalPages > 1)
        <nav class="products-list__pagination">
            @if ($currentPage > 1)
                <button wire:click="previousPage" class="products-list__page-btn">
                    {{ __('Previous', 'sage') }}
                </button>
            @endif

            @for ($i = 1; $i <= $totalPages; $i++)
                <button wire:click="goToPage({{ $i }})"
                    class="products-list__page-btn {{ $i === $currentPage ? 'is-active' : '' }}">
                    {{ $i }}
                </button>
            @endfor

            @if ($currentPage < $totalPages)
                <button wire:click="nextPage" class="products-list__page-btn">
                    {{ __('Next', 'sage') }}
                </button>
            @endif
        </nav>
    @endif
</div>
