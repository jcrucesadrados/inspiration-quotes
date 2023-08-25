<?php

namespace Jcrucesadrados\Inspire\Routes;

use Illuminate\Support\Facades\Route;
use Jcrucesadrados\Inspire\Controllers\InspirationController;

Route::get('inspire', InspirationController::class);
