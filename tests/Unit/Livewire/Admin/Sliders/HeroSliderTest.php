<?php

use App\Livewire\Admin\Sliders\HeroSlider;

if (! class_exists('WP_Query')) {
    class WP_Query
    {
        public array $args;

        public array $posts;

        public function __construct(array $args)
        {
            $this->args = $args;
            $this->posts = $GLOBALS['__test_wp_query_posts'] ?? [];
        }
    }
}

test('slides retorna posts da query de hero_slide', function () {
    $slide = new stdClass;
    $slide->post_title = 'Slide 1';

    $GLOBALS['__test_wp_query_posts'] = [$slide];

    $component = new HeroSlider;
    $slides = $component->slides();

    expect($slides)->toHaveCount(1);
    expect($slides[0]->post_title)->toBe('Slide 1');

    unset($GLOBALS['__test_wp_query_posts']);
});

test('render retorna a view do componente', function () {
    $component = new HeroSlider;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.admin.sliders.hero-slider');
});
