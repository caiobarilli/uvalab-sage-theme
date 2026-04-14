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

test('mount preenche dados basicos sem woocommerce', function () {
    Functions\expect('get_option')
        ->once()
        ->with('permalink_structure')
        ->andReturn('/%postname%/');

    $component = new SystemStatus;
    $component->mount();

    expect($component->wooInstalled)->toBeFalse();
    expect($component->wooVersion)->toBe('');
    expect($component->comingSoon)->toBeFalse();
    expect($component->myaccountPageId)->toBeNull();
    expect($component->myaccountTitle)->toBeNull();
    expect($component->myaccountContent)->toBeNull();
    expect($component->permalinkOk)->toBeTrue();
    expect($component->productCount)->toBe(0);
});

test('mount preenche dados completos com woocommerce', function () {
    if (! function_exists('WC')) {
        function WC()
        {
            $wc = new stdClass;
            $wc->version = '10.0.0';

            return $wc;
        }
    }

    Functions\expect('get_option')
        ->andReturnUsing(function (string $key) {
            return match ($key) {
                'woocommerce_coming_soon' => 'yes',
                'woocommerce_myaccount_page_id' => 12,
                'permalink_structure' => '/%postname%/',
                default => null,
            };
        });

    $counts = new stdClass;
    $counts->publish = 5;

    Functions\expect('wp_count_posts')
        ->once()
        ->with('product')
        ->andReturn($counts);

    $page = new stdClass;
    $page->post_title = 'Minha Conta';

    Functions\expect('get_post')
        ->once()
        ->with(12)
        ->andReturn($page);

    $component = new SystemStatus;
    $component->mount();

    expect($component->wooInstalled)->toBeTrue();
    expect($component->wooVersion)->toBe('10.0.0');
    expect($component->comingSoon)->toBeTrue();
    expect($component->myaccountPageId)->toBe(12);
    expect($component->myaccountTitle)->toBe('Minha Conta');
    expect($component->permalinkOk)->toBeTrue();
    expect($component->productCount)->toBe(5);
});

test('render retorna a view do componente', function () {
    $component = new SystemStatus;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.admin.system-status');
});
