<?php

namespace Jcrucesadrados\Inspire\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Jcrucesadrados\Inspire\Domain\Repositories\InspireQuoteRepository;
use Jcrucesadrados\Inspire\Infrastructure\Repositories\TypeFitInspireRepository;

class InspirationServiceProvider extends ServiceProvider
{
    public array $bindings = [
        InspireQuoteRepository::class => TypeFitInspireRepository::class,
    ];

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Infrastructure/Routes/InspireRoutes.php');
    }
}
