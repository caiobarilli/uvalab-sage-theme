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
                'content' => '
                    <!-- wp:group {"className":"hero-slide-layout","layout":{"type":"default"}} -->
                    <div class="wp-block-group hero-slide-layout">

                        <!-- wp:group {"className":"hero-slide__content","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__content">

                            <!-- wp:paragraph {"className":"hero-slide__subtitle"} -->
                            <p class="hero-slide__subtitle">Winter Collection 2024</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":1,"className":"hero-slide__title"} -->
                            <h1 class="wp-block-heading hero-slide__title">A Tradition in Every Sip</h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"hero-slide__description"} -->
                            <p class="hero-slide__description">A meticulous curation from the most remote and prestigious vineyards in the world.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"className":"hero-slide__button-wrapper","layout":{"type":"default"}} -->
                            <div class="wp-block-group hero-slide__button-wrapper">
                                <!-- wp:paragraph {"className":"hero-slide__button-link"} -->
                                <p class="hero-slide__button-link"><a href="/shop">Discover Collection</a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"hero-slide__image-wrapper","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__image-wrapper">

                            <!-- wp:image {"sizeSlug":"large","className":"hero-slide__image-container"} -->
                            <figure class="wp-block-image size-large hero-slide__image-container">
                                <img src="https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle" alt="Wine Bottle"/>
                            </figure>
                            <!-- /wp:image -->

                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->
                ',
                'order' => 1,
            ],
            [
                'title' => 'The Art of Fine Wine',
                'content' => '
                    <!-- wp:group {"className":"hero-slide-layout","layout":{"type":"default"}} -->
                    <div class="wp-block-group hero-slide-layout">

                        <!-- wp:group {"className":"hero-slide__content","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__content">

                            <!-- wp:paragraph {"className":"hero-slide__subtitle"} -->
                            <p class="hero-slide__subtitle">Winter Collection 2024</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":1,"className":"hero-slide__title"} -->
                            <h1 class="wp-block-heading hero-slide__title">A Tradition in Every Sip</h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"hero-slide__description"} -->
                            <p class="hero-slide__description">A meticulous curation from the most remote and prestigious vineyards in the world.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"className":"hero-slide__button-wrapper","layout":{"type":"default"}} -->
                            <div class="wp-block-group hero-slide__button-wrapper">
                                <!-- wp:paragraph {"className":"hero-slide__button-link"} -->
                                <p class="hero-slide__button-link"><a href="/shop">Discover Collection</a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"hero-slide__image-wrapper","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__image-wrapper">

                            <!-- wp:image {"sizeSlug":"large","className":"hero-slide__image-container"} -->
                            <figure class="wp-block-image size-large hero-slide__image-container">
                                <img src="https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle" alt="Wine Bottle"/>
                            </figure>
                            <!-- /wp:image -->

                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->
                ',
                'order' => 2,
            ],
            [
                'title' => 'Taste the Difference',
                'content' => '
                    <!-- wp:group {"className":"hero-slide-layout","layout":{"type":"default"}} -->
                    <div class="wp-block-group hero-slide-layout">

                        <!-- wp:group {"className":"hero-slide__content","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__content">

                            <!-- wp:paragraph {"className":"hero-slide__subtitle"} -->
                            <p class="hero-slide__subtitle">Winter Collection 2024</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":1,"className":"hero-slide__title"} -->
                            <h1 class="wp-block-heading hero-slide__title">A Tradition in Every Sip</h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"className":"hero-slide__description"} -->
                            <p class="hero-slide__description">A meticulous curation from the most remote and prestigious vineyards in the world.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"className":"hero-slide__button-wrapper","layout":{"type":"default"}} -->
                            <div class="wp-block-group hero-slide__button-wrapper">
                                <!-- wp:paragraph {"className":"hero-slide__button-link"} -->
                                <p class="hero-slide__button-link"><a href="/shop">Discover Collection</a></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"className":"hero-slide__image-wrapper","layout":{"type":"default"}} -->
                        <div class="wp-block-group hero-slide__image-wrapper">

                            <!-- wp:image {"sizeSlug":"large","className":"hero-slide__image-container"} -->
                            <figure class="wp-block-image size-large hero-slide__image-container">
                                <img src="https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle" alt="Wine Bottle"/>
                            </figure>
                            <!-- /wp:image -->

                        </div>
                        <!-- /wp:group -->

                    </div>
                    <!-- /wp:group -->
                ',
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
