<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ProductsList extends Component
{
    public int $perPage = 6;

    public int $currentPage = 1;

    public array $selectedSubcategories = [];

    public string $minPrice = '';

    public string $maxPrice = '';

    #[On('filters-updated')]
    public function applyFilters(array $filters): void
    {
        $this->selectedSubcategories = $filters['subcategories'] ?? [];
        $this->minPrice = $filters['minPrice'] ?? '';
        $this->maxPrice = $filters['maxPrice'] ?? '';
        $this->currentPage = 1;
    }

    public function render()
    {
        $args = [
            'post_type' => 'product',
            'posts_per_page' => $this->perPage,
            'paged' => $this->currentPage,
            'post_status' => 'publish',
        ];

        if (! empty($this->selectedSubcategories)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $this->selectedSubcategories,
                    'operator' => 'IN',
                ],
            ];
        }

        if ($this->minPrice !== '' || $this->maxPrice !== '') {
            $args['meta_query'] = ['relation' => 'AND'];

            if ($this->minPrice !== '') {
                $args['meta_query'][] = [
                    'key' => '_price',
                    'value' => (float) $this->minPrice,
                    'compare' => '>=',
                    'type' => 'NUMERIC',
                ];
            }

            if ($this->maxPrice !== '') {
                $args['meta_query'][] = [
                    'key' => '_price',
                    'value' => (float) $this->maxPrice,
                    'compare' => '<=',
                    'type' => 'NUMERIC',
                ];
            }
        }

        $query = new \WP_Query($args);

        $products = array_map(function ($post) {
            $product = wc_get_product($post->ID);
            $categories = get_the_terms($post->ID, 'product_cat');
            $category = '';
            if ($categories && ! is_wp_error($categories)) {
                $category = $categories[0]->name;
            }

            return [
                'id' => $post->ID,
                'title' => $post->post_title,
                'permalink' => get_permalink($post->ID),
                'image' => get_the_post_thumbnail_url($post->ID, 'woocommerce_thumbnail') ?: 'https://placehold.co/300x300/f5f5f5/ccc?text=Product',
                'price' => $product ? $product->get_price_html() : '',
                'category' => $category,
            ];
        }, $query->posts);

        return view('livewire.products-list', [
            'products' => $products,
            'totalPages' => (int) $query->max_num_pages,
        ]);
    }

    public function previousPage(): void
    {
        $this->currentPage = max(1, $this->currentPage - 1);
    }

    public function nextPage(): void
    {
        $this->currentPage++;
    }

    public function goToPage(int $page): void
    {
        $this->currentPage = $page;
    }
}
