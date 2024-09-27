<?php

namespace Spatie\ElasticsearchQueryBuilder\Tests\Queries\FunctionScore;

use PHPUnit\Framework\TestCase;
use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\RandomScore;

class RandomScoreTest extends TestCase
{
    private RandomScore $randomScore;

    protected function setUp(): void
    {
        $this->randomScore = new RandomScore(123, 'test_field');
    }

    public function testToArray(): void
    {
        self::assertEquals(
            [
                'random_score' => [
                    'seed' => 123,
                    'field' => 'test_field',
                ]
            ],
            $this->randomScore->toArray()
        );
    }
}
