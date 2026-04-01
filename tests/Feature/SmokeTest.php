<?php

use App\Livewire\Quote;
use Roots\Acorn\Application;

it('aplicação sobe sem erros', function () {
    expect(Application::getInstance())->not->toBeNull();
});

it('autoload das classes funciona', function () {
    expect(class_exists(Quote::class))->toBeTrue();
});

it('helpers do projeto existem', function () {
    expect(function_exists('app'))->toBeTrue();
});
