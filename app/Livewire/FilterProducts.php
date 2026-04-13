<?php

namespace App\Livewire;

use Livewire\Component;

class FilterProducts extends Component
{
    public array $selectedSubcategories = [];

    public string $minPrice = '';

    public string $maxPrice = '';

    public function render()
    {
        $categories = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent' => 0,
            'exclude' => [get_option('default_product_cat')],
        ]);

        $grouped = [];

        if (! is_wp_error($categories) && ! empty($categories)) {
            foreach ($categories as $category) {
                $subcategories = get_terms([
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'parent' => $category->term_id,
                ]);

                if (! is_wp_error($subcategories) && ! empty($subcategories)) {
                    $grouped[] = [
                        'id' => $category->term_id,
                        'name' => $category->name,
                        'subcategories' => array_map(fn ($sub) => [
                            'id' => $sub->term_id,
                            'name' => $sub->name,
                        ], $subcategories),
                    ];
                }
            }
        }

        return view('livewire.filter-products', [
            'grouped' => $grouped,
        ]);
    }

    public function updatedSelectedSubcategories(): void
    {
        $this->dispatch('filters-updated', [
            'subcategories' => array_map('intval', $this->selectedSubcategories),
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);
    }

    public function applyPriceFilter(): void
    {
        $this->dispatch('filters-updated', [
            'subcategories' => array_map('intval', $this->selectedSubcategories),
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);
    }

    public function clearFilters(): void
    {
        $this->selectedSubcategories = [];
        $this->minPrice = '';
        $this->maxPrice = '';

        $this->dispatch('filters-updated', [
            'subcategories' => [],
            'minPrice' => '',
            'maxPrice' => '',
        ]);
    }
}
