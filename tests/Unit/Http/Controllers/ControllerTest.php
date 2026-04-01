<?php

use App\Http\Controllers\Controller;

test('controller base e abstrato', function () {
    $reflection = new ReflectionClass(Controller::class);

    expect($reflection->isAbstract())->toBeTrue();
});
