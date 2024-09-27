<?php

namespace Spatie\ElasticsearchQueryBuilder\Tests\Queries\FunctionScore;

use PHPUnit\Framework\TestCase;
use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\Weight;

class WeightTest extends TestCase
{
    private Weight $weight;

    protected function setUp(): void
    {
        $this->weight = Weight::create(2.0);
    }

    public function testToArray(): void
    {
        self::assertEquals(
            [
                'weight' => 2.0,
            ],
            $this->weight->toArray()
        );
    }
}
