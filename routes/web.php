<?php

use App\Http\Controllers\Admin\ThemeOptionsController;
use App\Http\Controllers\ComingSoonController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Customer\Dashboard;

Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming-soon');

Route::group(['prefix' => 'uvalab-admin', 'as' => 'uvalab.'], function () {
    Route::get('/', [ThemeOptionsController::class, 'index'])->name('index');

    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/hero', [ThemeOptionsController::class, 'heroSlider'])->name('hero');
    });
});

Route::group(['as' => 'auth.'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/logout', function () {
        wp_logout();

        return redirect('/login');
    })->name('logout');
});

Route::group(['as' => 'customer.'], function () {
    if (function_exists('wc_get_page_permalink')) {
        Route::get(
            parse_url(wc_get_page_permalink('myaccount'), PHP_URL_PATH),
            Dashboard::class
        )->name('account');
    } else {
        Route::get('/my-account', Dashboard::class)->name('account');
    }
});
