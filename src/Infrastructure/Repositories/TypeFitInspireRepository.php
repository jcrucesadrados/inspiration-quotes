<?php

namespace Jcrucesadrados\Inspire\Infrastructure\Repositories;

use Arr;
use Illuminate\Support\Facades\Http;
use Jcrucesadrados\Inspire\Domain\Repositories\InspireQuoteRepository;
use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;

class TypeFitInspireRepository implements InspireQuoteRepository
{

    public function getSingleQuote(): Quote
    {
        $response = Http::get('https://type.fit/api/quotes');
        $quotes = $response->json();

        return Quote::fromArray(Arr::get($quotes, rand(0, count($quotes) - 1)));
    }
}
