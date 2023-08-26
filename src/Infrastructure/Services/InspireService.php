<?php

namespace Jcrucesadrados\Inspire\Infrastructure\Services;

use Jcrucesadrados\Inspire\Domain\Repositories\InspireQuoteRepository;

class InspireService {
    public function __construct(private InspireQuoteRepository $inspireQuoteRepository)
    {
    }

    public function getSingleQuote(): string
    {
        $quote = $this->inspireQuoteRepository->getSingleQuote();

        return $quote->toString();
    }
}
