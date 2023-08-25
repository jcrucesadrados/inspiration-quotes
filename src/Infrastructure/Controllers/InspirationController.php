<?php

namespace Jcrucesadrados\Inspire\Infrastructure\Controllers;

use Jcrucesadrados\Inspire\Infrastructure\Services\InspireService;

class InspirationController
{
    public function __invoke(InspireService $inspire): string
    {
        return $inspire->justDoIt();
    }
}
