<?php

use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase
{
    private Quote $quote;
    protected function setUp(): void
    {
        parent::setUp();

        $data = [
            'text' => 'A nice quote',
            'author' => 'The author',
        ];

        $this->quote = Quote::fromArray($data);
    }

    /** @test */
    public function fromArrayShouldCreateQuoteWhenAllFieldsArePresent(): void
    {
        // then
        $this->assertInstanceOf(Quote::class, $this->quote);
    }

    /**
     * @test
     * @dataProvider provideInvalidArrayData
     */
    public function fromArrayShouldThrowExceptionWhenMissingFields(array $data): void
    {
        // then
        $this->expectException(InvalidArgumentException::class);

        // when
        Quote::fromArray($data);
    }

    public static function provideInvalidArrayData(): array
    {
        return [
            'missing text' => [
                'data' => ['author' => 'Author Name'],
            ],
            'missing author' => [
                'data' => ['text' => 'A nice quote'],
            ],
        ];
    }

    /** @test */
    public function toStringShouldReturnFormattedQuote(): void
    {
        // then
        $this->assertEquals(
            sprintf("%s - %s", $this->quote->text, $this->quote->author),
            $this->quote->toString(),
        );
    }

}
