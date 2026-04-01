<?php

use App\Livewire\Slider;
use Brain\Monkey;
use Brain\Monkey\Functions;

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

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('mount nao carrega slides quando tipo nao e hero', function () {
    $component = new Slider;
    $component->type = 'custom';
    $component->mount();

    expect($component->slides)->toBe([]);
});

test('mount carrega slides quando tipo e hero', function () {
    $postA = new stdClass;
    $postA->post_title = 'Slide A';
    $postA->post_content = 'Conteudo A';

    $postB = new stdClass;
    $postB->post_title = 'Slide B';
    $postB->post_content = 'Conteudo B';

    $GLOBALS['__test_wp_query_posts'] = [$postA, $postB];

    Functions\expect('apply_filters')
        ->twice()
        ->with('the_content', Mockery::type('string'))
        ->andReturnUsing(fn (string $hook, string $content) => 'filtrado: '.$content);

    $component = new Slider;
    $component->type = 'hero';
    $component->mount();

    expect($component->slides)->toHaveCount(2);
    expect($component->slides[0]['title'])->toBe('Slide A');
    expect($component->slides[0]['content'])->toBe('filtrado: Conteudo A');
    expect($component->slides[1]['title'])->toBe('Slide B');
    expect($component->slides[1]['content'])->toBe('filtrado: Conteudo B');

    unset($GLOBALS['__test_wp_query_posts']);
});

test('render retorna a view do componente', function () {
    $component = new Slider;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.slider');
});
