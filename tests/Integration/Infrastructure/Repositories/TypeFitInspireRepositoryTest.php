<?php

namespace Jcrucesadrados\Inspire\Tests\Integration\Infrastructure\Repositories;

use Illuminate\Support\Facades\App;
use Jcrucesadrados\Inspire\Domain\ValueObjects\Quote;
use Jcrucesadrados\Inspire\Infrastructure\Repositories\TypeFitInspireRepository;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase;

class TypeFitInspireRepositoryTest extends TestCase
{
    use WithWorkbench;

    public TypeFitInspireRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = App::get(TypeFitInspireRepository::class);
    }

    /** @test */
    public function getSingleQuoteShouldGetQuoteFromRemoteService(): void
    {
        // when
        $quote = $this->repository->getSingleQuote();

        // then
        $this->assertInstanceOf(Quote::class, $quote);
    }
}
