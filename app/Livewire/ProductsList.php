<?php

namespace App\Livewire;

use Livewire\Component;

class ProductsList extends Component
{
    public int $perPage = 4;

    public int $currentPage = 1;

    public function render()
    {
        $query = new \WP_Query([
            'post_type' => 'product',
            'posts_per_page' => $this->perPage,
            'paged' => $this->currentPage,
            'post_status' => 'publish',
        ]);

        $products = array_map(function ($post) {
            $product = wc_get_product($post->ID);

            return [
                'id' => $post->ID,
                'title' => $post->post_title,
                'permalink' => get_permalink($post->ID),
                'image' => get_the_post_thumbnail_url($post->ID, 'woocommerce_thumbnail') ?: 'https://placehold.co/300x300/f5f5f5/ccc?text=Product',
                'price' => $product ? $product->get_price_html() : '',
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
