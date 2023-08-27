<?php

namespace Jcrucesadrados\Inspire\Tests\Unit\Infrastructure\Services;

use Jcrucesadrados\Inspire\Domain\Repositories\InspireQuoteRepository;
use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;
use Jcrucesadrados\Inspire\Infrastructure\Services\InspireService;
use Mockery;
use Mockery\MockInterface;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;

class InspireServiceTest extends TestCase
{
    use WithWorkbench;

    private InspireQuoteRepository|MockInterface $inspireQuoteRepository;
    private InspireService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inspireQuoteRepository = Mockery::mock(InspireQuoteRepository::class);

        $this->service = new InspireService(
            $this->inspireQuoteRepository,
        );
    }

    /** @test */
    public function getSingleQuoteShouldReturnStringQuote(): void
    {
        // given
        $expectedQuote = Quote::fromArray([
            'text' => 'This is an inspirational quote',
            'author' => 'The package authors',
        ]);

        $this->inspireQuoteRepository->shouldReceive('getSingleQuote')
            ->once()
            ->andReturn($expectedQuote);

        // when
        $quote = $this->service->getSingleQuote();

        // then
        $this->assertEquals($expectedQuote->toString(), $quote);
    }
}
