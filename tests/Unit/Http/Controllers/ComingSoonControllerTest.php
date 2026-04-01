<?php

use App\Http\Controllers\ComingSoonController;
use Brain\Monkey;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('index renderiza a view coming-soon', function () {
    $controller = new ComingSoonController;

    expect($controller->index())->toBe([
        'view' => 'coming-soon',
        'data' => [],
        'mergeData' => [],
    ]);
});
