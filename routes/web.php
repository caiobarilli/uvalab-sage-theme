<?php

use App\Http\Controllers\Admin\ThemeOptionsController;
use App\Http\Controllers\ComingSoonController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Customer\Dashboard;
use App\Livewire\Customer\Downloads;
use App\Livewire\Customer\EditAccount;
use App\Livewire\Customer\EditAddress;
use App\Livewire\Customer\Orders;
use App\Livewire\Customer\ViewOrder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

        return Redirect::to('/login');
    })->name('logout');
});

Route::group(['as' => 'customer.'], function () {
    $base = '/my-account';

    if (function_exists('wc_get_page_permalink')) {
        $base = rtrim(parse_url(wc_get_page_permalink('myaccount'), PHP_URL_PATH), '/');
    }

    Route::get($base, Dashboard::class)->name('account');
    Route::get($base.'/orders', Orders::class)->name('orders');
    Route::get($base.'/view-order/{orderId}', ViewOrder::class)->name('view-order');
    Route::get($base.'/downloads', Downloads::class)->name('downloads');
    Route::get($base.'/edit-address', EditAddress::class)->name('edit-address');
    Route::get($base.'/edit-account', EditAccount::class)->name('edit-account');
});
