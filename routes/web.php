<?php

use App\Http\Controllers\Admin\ThemeOptionsController;

Route::get('/uvalab-admin', [ThemeOptionsController::class, 'index']);
