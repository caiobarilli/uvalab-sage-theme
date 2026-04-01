<?php

use App\Livewire\Auth\Login;
use Brain\Monkey;
use Brain\Monkey\Functions;

class TestableLoginComponent extends Login
{
    public ?string $redirectedTo = null;

    public array $validatedRules = [];

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        $this->validatedRules = $rules ?? [];

        return [];
    }

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

test('submit define erro quando credenciais sao invalidas', function () {
    $error = new stdClass;

    Functions\expect('wp_signon')->once()->andReturn($error);
    Functions\expect('is_wp_error')->once()->with($error)->andReturn(true);
    Functions\expect('wp_set_current_user')->never();
    Functions\expect('wp_set_auth_cookie')->never();

    $component = new TestableLoginComponent;
    $component->login = 'usuario';
    $component->password = 'senha';
    $component->submit();

    expect($component->error)->toBe('Invalid username or password.');
    expect($component->redirectedTo)->toBeNull();
});

test('submit autentica e redireciona em caso de sucesso', function () {
    $user = new stdClass;
    $user->ID = 7;

    Functions\expect('wp_signon')->once()->andReturn($user);
    Functions\expect('is_wp_error')->once()->with($user)->andReturn(false);
    Functions\expect('wp_set_current_user')->once()->with(7);
    Functions\expect('wp_set_auth_cookie')->once()->with(7, true);
    Functions\expect('wc_get_page_permalink')->once()->with('myaccount')->andReturn('/my-account');

    $component = new TestableLoginComponent;
    $component->login = 'usuario';
    $component->password = 'senha';
    $component->submit();

    expect($component->redirectedTo)->toBe('/my-account');
});

test('render retorna a view com layout de autenticacao', function () {
    $component = new TestableLoginComponent;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.auth.login');
    expect($result->layout)->toBe('layouts.auth');
});
