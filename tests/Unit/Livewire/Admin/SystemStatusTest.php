<?php

use App\Livewire\Admin\SystemStatus;
use Brain\Monkey;
use Brain\Monkey\Functions;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('mount preenche dados basicos de status do sistema', function () {
    Functions\expect('get_option')
        ->times(3)
        ->andReturnUsing(function (string $key) {
            return match ($key) {
                'woocommerce_coming_soon' => 'yes',
                'woocommerce_myaccount_page_id' => 12,
                'permalink_structure' => '/%postname%/',
                default => null,
            };
        });

    $page = new stdClass;
    $page->post_title = 'Minha Conta';
    $page->post_content = '[uvalab_my_account]';

    Functions\expect('get_post')
        ->once()
        ->with(12)
        ->andReturn($page);

    $component = new SystemStatus;
    $component->mount();

    expect($component->wooInstalled)->toBeFalse();
    expect($component->wooVersion)->toBe('');
    expect($component->comingSoon)->toBeTrue();
    expect($component->myaccountPageId)->toBe(12);
    expect($component->myaccountTitle)->toBe('Minha Conta');
    expect($component->myaccountContent)->toBe('[uvalab_my_account]');
    expect($component->permalinkOk)->toBeTrue();
    expect($component->productCount)->toBe(0);
});

test('render retorna a view do componente', function () {
    $component = new SystemStatus;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.admin.system-status');
});
