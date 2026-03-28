<?php
/**
 * Title: Hero Slide
 * Slug: uvalab/hero-slide
 * Categories: uvalab
 * Block Types: core/post-content
 * Post Types: hero_slide
 */
?>
<!-- wp:group {"className":"hero-slide-layout","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-slide-layout">

    <!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center">

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

            <!-- wp:paragraph {"className":"slide-subtitle"} -->
            <p class="slide-subtitle">Winter Collection 2024</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":1,"className":"slide-title"} -->
            <h1 class="wp-block-heading slide-title">A Tradition in Every Sip</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"slide-description"} -->
            <p class="slide-description">A meticulous curation from the most remote and prestigious vineyards in the world.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"style":{"color":{"background":"#7a1c2e","text":"#ffffff"}}} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-text-color has-background wp-element-button" href="/shop" style="color:#ffffff;background-color:#7a1c2e">Discover Collection</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

            <!-- wp:image {"sizeSlug":"large","className":"slide-image"} -->
            <figure class="wp-block-image size-large slide-image">
                <img src="https://placehold.co/600x700/f5f5f5/ccc?text=Wine+Bottle" alt="Wine Bottle"/>
            </figure>
            <!-- /wp:image -->

        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
