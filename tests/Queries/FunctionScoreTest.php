<?php

namespace Spatie\ElasticsearchQueryBuilder\Tests\Queries;

use PHPUnit\Framework\TestCase;
use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

class FunctionScoreTest extends TestCase
{
    private FunctionScore $functionScore;

    protected function setUp(): void
    {
        $this->functionScore = new FunctionScore();
    }

    public function testToArray(): void
    {
        $functionMock = $this->createMock(FunctionScore\FunctionScoreFunction::class);

        $this->functionScore
            ->addFunction($functionMock)
            ->boost(2.0)
            ->scoreMode('avg')
            ->boostMode('multiply');

        self::assertEquals(
            [
                'functions' => [
                    $functionMock
                ],
                'score_mode' => 'avg',
                'boost_mode' => 'multiply',
                'boost' => 2.0,
            ],
            $this->functionScore->toArray()
        );
    }
}
