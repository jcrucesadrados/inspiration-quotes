<?php

namespace Jcrucesadrados\Inspire\Infrastructure;

use Illuminate\Support\ServiceProvider;

class InspirationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/InspireRoutes.php');
    }
}
