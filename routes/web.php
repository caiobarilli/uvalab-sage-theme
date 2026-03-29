<?php

use App\Http\Controllers\Admin\ThemeOptionsController;

Route::group(['prefix' => 'uvalab-admin', 'as' => 'uvalab.'], function () {
    Route::get('/', [ThemeOptionsController::class, 'index'])->name('index');

    Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
        Route::get('/hero', [ThemeOptionsController::class, 'heroSlider'])->name('hero');
    });
});
