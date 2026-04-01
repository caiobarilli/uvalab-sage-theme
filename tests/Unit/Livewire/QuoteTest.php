<?php

use App\Livewire\Quote;

test('quote possui valor padrao esperado', function () {
    $component = new Quote;

    expect($component->quote)->toBe('Silence is the loudest form of communication.');
});

test('render retorna a view do componente', function () {
    $component = new Quote;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.quote');
});
