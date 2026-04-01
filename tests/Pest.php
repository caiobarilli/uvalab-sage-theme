<?php

use Tests\TestCase;

require_once __DIR__.'/Support/AppHelperStub.php';

/*
|--------------------------------------------------------------------------
| Test Case Bindings
|--------------------------------------------------------------------------
|
| Aqui definimos qual TestCase e quais traits serão usados automaticamente
| por pasta.
|
*/

// Feature tests
uses(TestCase::class)->in('Feature');

// Unit tests → sem Laravel (mais rápido, mais isolado)
uses()->in('Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Você pode criar expectativas customizadas para deixar os testes
| mais expressivos.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
|
| Funções globais reutilizáveis para testes.
| Use com cuidado.
|
*/

function something(): void
{
    // helper compartilhado
}
