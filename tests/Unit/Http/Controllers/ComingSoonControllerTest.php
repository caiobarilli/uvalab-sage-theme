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

    $result = $controller->index();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('coming-soon');
    expect($result->data)->toBe([]);
    expect($result->mergeData)->toBe([]);
});
