<?php

use App\Livewire\Customer\Dashboard;
use Brain\Monkey;
use Brain\Monkey\Functions;

class TestableDashboardComponent extends Dashboard
{
    public ?string $redirectedTo = null;

    public function redirect($url, $navigate = false)
    {
        $this->redirectedTo = $url;

        return null;
    }
}

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('mount redireciona para login quando usuario nao esta autenticado', function () {
    Functions\expect('is_user_logged_in')->once()->andReturn(false);
    Functions\expect('wp_get_current_user')->never();

    $component = new TestableDashboardComponent;
    $component->mount();

    expect($component->redirectedTo)->toBe('/login');
});

test('mount popula nome e email quando usuario esta autenticado', function () {
    $user = new stdClass;
    $user->display_name = 'Cliente Uva';
    $user->user_email = 'cliente@example.com';

    Functions\expect('is_user_logged_in')->once()->andReturn(true);
    Functions\expect('wp_get_current_user')->once()->andReturn($user);

    $component = new TestableDashboardComponent;
    $component->mount();

    expect($component->displayName)->toBe('Cliente Uva');
    expect($component->redirectedTo)->toBeNull();
});

test('render retorna a view do dashboard', function () {
    $component = new TestableDashboardComponent;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.customer.dashboard');
});
