<?php

namespace Jcrucesadrados\Inspire;

use Arr;
use Illuminate\Support\Facades\Http;
use Jcrucesadrados\Inspire\ValueObjects\Quote;

class Inspire {
    public function justDoIt(): string
    {
        return $this->getRandomQuote()->toString();
    }

    private function getRandomQuote(): Quote
    {
        $response = Http::get('https://type.fit/api/quotes');
        $quotes = $response->json();

        return Quote::fromArray(Arr::get($quotes, rand(0, count($quotes) - 1)));
    }
}
