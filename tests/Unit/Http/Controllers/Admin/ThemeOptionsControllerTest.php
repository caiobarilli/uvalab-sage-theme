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

    expect($controller->index())->toBe([
        'view' => 'admin.theme-options',
        'data' => [],
        'mergeData' => [],
    ]);
});

test('heroSlider renderiza a view do slider quando usuario pode gerenciar opcoes', function () {
    Functions\expect('current_user_can')
        ->once()
        ->with('manage_options')
        ->andReturn(true);
    Functions\expect('wp_redirect')->never();

    $controller = new ThemeOptionsController;

    expect($controller->heroSlider())->toBe([
        'view' => 'admin.sliders.hero',
        'data' => [],
        'mergeData' => [],
    ]);
});
