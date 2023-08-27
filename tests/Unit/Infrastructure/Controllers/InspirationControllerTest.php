<?php

namespace Jcrucesadrados\Inspire\Tests\Unit\Infrastructure\Controllers;

use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;
use Jcrucesadrados\Inspire\Infrastructure\Controllers\InspirationController;
use Jcrucesadrados\Inspire\Infrastructure\Services\InspireService;
use Mockery;
use Orchestra\Testbench\TestCase;

class InspirationControllerTest extends TestCase
{
    /** @test */
    public function itShouldReturnInspirationalQuoteAsString(): void
    {
        // given
        $controller = $this->app->get(InspirationController::class);
        $quote = Quote::fromArray([
            'text' => 'Quote',
            'author' => 'Author',
        ]);

        $mockService = Mockery::mock(InspireService::class);
        $mockService->shouldReceive('getSingleQuote')
            ->andReturn($quote->toString());

        // when
        $response = $controller->__invoke($mockService);

        // then
        $this->assertEquals($quote->toString(), $response);
    }
}
