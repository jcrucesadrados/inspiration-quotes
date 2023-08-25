<?php

namespace Jcrucesadrados\Inspire\Controllers;

use Jcrucesadrados\Inspire\Inspire;

class InspirationController
{
    public function __invoke(Inspire $inspire): string
    {
        return $inspire->justDoIt();
    }
}
