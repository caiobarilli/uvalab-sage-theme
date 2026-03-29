<?php

use App\Http\Controllers\Admin\ThemeOptionsController;

Route::get('/uvalab-admin', [ThemeOptionsController::class, 'index']);
Route::get('/uvalab-admin/sliders/hero', [ThemeOptionsController::class, 'heroSlider']);
