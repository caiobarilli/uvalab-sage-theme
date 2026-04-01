<?php

use App\Livewire\Admin\Seeder;
use Brain\Monkey;
use Brain\Monkey\Functions;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('run bloqueia usuario sem permissao', function () {
    Functions\expect('current_user_can')
        ->once()
        ->with('manage_options')
        ->andReturn(false);

    $component = new Seeder;
    $component->run();

    expect($component->output)->toBe('Permission denied.');
    expect($component->success)->toBeFalse();
    expect($component->ran)->toBeTrue();
});

test('render retorna a view do componente', function () {
    $component = new Seeder;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.admin.seeder');
});
