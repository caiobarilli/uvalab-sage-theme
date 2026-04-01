<?php

use App\Livewire\Auth\Register;
use Brain\Monkey;
use Brain\Monkey\Functions;

if (! class_exists('WP_User')) {
    class WP_User
    {
        public static array $roles = [];

        public int $id;

        public function __construct(int $id)
        {
            $this->id = $id;
        }

        public function set_role(string $role): void
        {
            self::$roles[$this->id] = $role;
        }
    }
}

class RegisterErrorStub
{
    public function get_error_message(): string
    {
        return 'Erro ao criar usuario';
    }
}

class TestableRegisterComponent extends Register
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
    WP_User::$roles = [];
});

test('submit retorna erro quando username ja existe', function () {
    Functions\expect('username_exists')->once()->with('usuario')->andReturn(true);
    Functions\expect('email_exists')->never();

    $component = new TestableRegisterComponent;
    $component->username = 'usuario';
    $component->email = 'uvalab@example.com';
    $component->password = '123456';
    $component->submit();

    expect($component->error)->toBe('This username already exists.');
    expect($component->redirectedTo)->toBeNull();
});

test('submit retorna erro quando email ja existe', function () {
    Functions\expect('username_exists')->once()->with('usuario')->andReturn(false);
    Functions\expect('email_exists')->once()->with('uvalab@example.com')->andReturn(true);

    $component = new TestableRegisterComponent;
    $component->username = 'usuario';
    $component->email = 'uvalab@example.com';
    $component->password = '123456';
    $component->submit();

    expect($component->error)->toBe('This email is already registered.');
    expect($component->redirectedTo)->toBeNull();
});

test('submit retorna mensagem de erro quando wp_create_user falha', function () {
    $error = new RegisterErrorStub;

    Functions\expect('username_exists')->once()->andReturn(false);
    Functions\expect('email_exists')->once()->andReturn(false);
    Functions\expect('wp_create_user')->once()->andReturn($error);
    Functions\expect('is_wp_error')->once()->with($error)->andReturn(true);

    $component = new TestableRegisterComponent;
    $component->username = 'usuario';
    $component->email = 'uvalab@example.com';
    $component->password = '123456';
    $component->submit();

    expect($component->error)->toBe('Erro ao criar usuario');
    expect($component->redirectedTo)->toBeNull();
});

test('submit cria usuario define role e redireciona no sucesso', function () {
    Functions\expect('username_exists')->once()->andReturn(false);
    Functions\expect('email_exists')->once()->andReturn(false);
    Functions\expect('wp_create_user')->once()->andReturn(10);
    Functions\expect('is_wp_error')->once()->with(10)->andReturn(false);
    Functions\expect('wp_set_current_user')->once()->with(10);
    Functions\expect('wp_set_auth_cookie')->once()->with(10, true);
    Functions\expect('wc_get_page_permalink')->once()->with('myaccount')->andReturn('/my-account');

    $component = new TestableRegisterComponent;
    $component->username = 'usuario';
    $component->email = 'uvalab@example.com';
    $component->password = '123456';
    $component->submit();

    expect($component->redirectedTo)->toBe('/my-account');
    expect(WP_User::$roles[10] ?? null)->toBe('subscriber');
});

test('render retorna a view com layout de autenticacao', function () {
    $component = new TestableRegisterComponent;
    $result = $component->render();

    expect($result)->toBeInstanceOf(TestViewResult::class);
    expect($result->view)->toBe('livewire.auth.register');
    expect($result->layout)->toBe('layouts.auth');
});
