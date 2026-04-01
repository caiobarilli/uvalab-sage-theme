<?php

use App\Http\Middleware\CustomerMiddleware;
use Brain\Monkey;
use Brain\Monkey\Functions;

beforeEach(function () {
    Monkey\setUp();
});

afterEach(function () {
    Monkey\tearDown();
});

test('handle registra action admin_init', function () {
    Functions\expect('add_action')
        ->once()
        ->with('admin_init', Mockery::type('callable'));

    $middleware = new CustomerMiddleware;
    $middleware->handle();
});

test('nao redireciona usuario nao logado', function () {
    Functions\expect('add_action')
        ->once()
        ->with('admin_init', Mockery::type('callable'))
        ->andReturnUsing(function (string $hook, callable $callback) {
            $callback();
        });

    Functions\expect('is_user_logged_in')->once()->andReturn(false);
    Functions\expect('wp_get_current_user')->never();
    Functions\expect('wp_redirect')->never();

    $middleware = new CustomerMiddleware;
    $middleware->handle();
});

test('nao redireciona usuario nao subscriber', function () {
    $user = new stdClass;
    $user->roles = ['administrator'];

    Functions\expect('add_action')
        ->once()
        ->with('admin_init', Mockery::type('callable'))
        ->andReturnUsing(function (string $hook, callable $callback) {
            $callback();
        });

    Functions\expect('is_user_logged_in')->once()->andReturn(true);
    Functions\expect('wp_get_current_user')->once()->andReturn($user);
    Functions\expect('wp_redirect')->never();

    $middleware = new CustomerMiddleware;
    $middleware->handle();
});
