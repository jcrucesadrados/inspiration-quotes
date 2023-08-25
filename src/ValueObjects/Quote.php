<?php

namespace Jcrucesadrados\Inspire\ValueObjects;

use InvalidArgumentException;

readonly class Quote
{
    private const ARRAY_REQUIRED_FIELDS = ['text', 'author'];

    private function __construct(
        public string $text,
        public string $author,
    ){
    }

    public static function fromArray(array $quote): self
    {
        self::guardRequiredFields($quote);
        return new self($quote['text'], $quote['author']);
    }

    private static function guardRequiredFields(array $data): void
    {
        if (! empty($missingFields = array_diff(array_keys($data), self::ARRAY_REQUIRED_FIELDS))) {
            throw new InvalidArgumentException(
                sprintf('Required fields missing. %s are required', implode(', ', $missingFields)),
            );
        }
    }

    public function toString(): string
    {
        return sprintf('%s - %s', $this->text, $this->author);
    }
}
