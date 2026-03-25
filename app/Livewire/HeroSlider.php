<?php

namespace App\Livewire;

use Livewire\Component;

class HeroSlider extends Component
{
    public array $slides = [
        [
            'subtitle' => 'Winter Collection 2024',
            'title' => 'A Tradition in Every Sip',
            'description' => 'A meticulous curation from the most remote and prestigious vineyards in the world, preserved for the contemporary connoisseur.',
            'button_label' => 'Discover Collection',
            'button_url' => '/shop',
            'image_url' => 'https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle',
        ],
        [
            'subtitle' => 'Premium Selection 2024',
            'title' => 'The Art of Fine Wine',
            'description' => 'Explore our carefully selected wines from renowned regions around the world.',
            'button_label' => 'Explore Now',
            'button_url' => '/shop',
            'image_url' => 'https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle',
        ],
        [
            'subtitle' => 'Exclusive Harvest 2024',
            'title' => 'Taste the Difference',
            'description' => 'Each bottle tells a story of passion, dedication and the finest grapes.',
            'button_label' => 'Shop Now',
            'button_url' => '/shop',
            'image_url' => 'https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle',
        ],
    ];

    public function render()
    {
        return view('livewire.hero-slider');
    }
}
