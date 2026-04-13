<div class="filter-products">
    @foreach ($grouped as $category)
        <div class="filter-products__group">
            <h3 class="filter-products__title">{{ $category['name'] }}</h3>
            <hr class="filter-products__divider">

            @if (!empty($category['subcategories']))
                <ul class="filter-products__list">
                    @foreach ($category['subcategories'] as $sub)
                        <li class="filter-products__item">
                            <label class="filter-products__label">
                                <input type="checkbox" wire:model.live="selectedSubcategories" value="{{ $sub['id'] }}"
                                    class="filter-products__checkbox">
                                {{ $sub['name'] }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach

    <div class="filter-products__group">
        <h3 class="filter-products__title">{{ __('Preço', 'sage') }}</h3>
        <hr class="filter-products__divider">

        <div class="filter-products__price">
            <input type="number" wire:model.lazy="minPrice" placeholder="{{ __('Min', 'sage') }}"
                class="filter-products__price-input" min="0">
            <span class="filter-products__price-sep">—</span>
            <input type="number" wire:model.lazy="maxPrice" placeholder="{{ __('Max', 'sage') }}"
                class="filter-products__price-input" min="0">
            <button type="button" wire:click="applyPriceFilter" class="filter-products__price-btn">
                {{ __('Filtrar', 'sage') }}
            </button>
        </div>
    </div>

    @if (!empty($selectedSubcategories) || $minPrice !== '' || $maxPrice !== '')
        <button type="button" wire:click="clearFilters" class="filter-products__clear">
            {{ __('Limpar filtros', 'sage') }}
        </button>
    @endif
</div>
