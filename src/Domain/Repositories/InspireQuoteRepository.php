<?php

namespace Jcrucesadrados\Inspire\Domain\Repositories;

use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;

interface InspireQuoteRepository
{
    /**
     * @return Quote
     */
    public function getSingleQuote(): Quote;
}
