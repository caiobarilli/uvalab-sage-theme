<?php

use App\Http\Controllers\Admin\ThemeOptionsController;
use Brain\Monkey;
use Brain\Monkey\Functions;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('index renderiza a view de opcoes quando usuario pode gerenciar opcoes', function () {
    Functions\expect('current_user_can')
        ->once()
        ->with('manage_options')
        ->andReturn(true);
    Functions\expect('wp_redirect')->never();

    $controller = new ThemeOptionsController;

    $result = $controller->index();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('admin.theme-options');
    expect($result->data)->toBe([]);
    expect($result->mergeData)->toBe([]);
});

test('heroSlider renderiza a view do slider quando usuario pode gerenciar opcoes', function () {
    Functions\expect('current_user_can')
        ->once()
        ->with('manage_options')
        ->andReturn(true);
    Functions\expect('wp_redirect')->never();

    $controller = new ThemeOptionsController;

    $result = $controller->heroSlider();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('admin.sliders.hero');
    expect($result->data)->toBe([]);
    expect($result->mergeData)->toBe([]);
});
