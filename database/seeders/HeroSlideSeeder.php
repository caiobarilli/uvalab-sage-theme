<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title' => 'A Tradition in Every Sip',
                'content' => '<!-- wp:paragraph --><p class="slide-subtitle">Winter Collection 2024</p><!-- /wp:paragraph -->',
                'order' => 1,
            ],
            [
                'title' => 'The Art of Fine Wine',
                'content' => '<!-- wp:paragraph --><p class="slide-subtitle">Premium Selection 2024</p><!-- /wp:paragraph -->',
                'order' => 2,
            ],
            [
                'title' => 'Taste the Difference',
                'content' => '<!-- wp:paragraph --><p class="slide-subtitle">Exclusive Harvest 2024</p><!-- /wp:paragraph -->',
                'order' => 3,
            ],
        ];

        foreach ($slides as $slide) {
            wp_insert_post([
                'post_type' => 'hero_slide',
                'post_title' => $slide['title'],
                'post_content' => $slide['content'],
                'post_status' => 'publish',
                'menu_order' => $slide['order'],
            ]);
        }
    }
}
