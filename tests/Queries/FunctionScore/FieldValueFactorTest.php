<?php

namespace Spatie\ElasticsearchQueryBuilder\Tests\Queries\FunctionScore;

use PHPUnit\Framework\TestCase;
use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\FieldValueFactor;

class FieldValueFactorTest extends TestCase
{
    private FieldValueFactor $fieldValueFactor;

    protected function setUp(): void
    {
        $this->fieldValueFactor = new FieldValueFactor('test_field');
    }

    public function testToArray(): void
    {
        $this->fieldValueFactor
            ->factor(1.0)
            ->modifier('sqrt')
            ->missing(0.5);

        self::assertEquals(
            [
                'field_value_factor' => [
                    'field' => 'test_field',
                    'factor' => 1.0,
                    'modifier' => 'sqrt',
                    'missing' => 0.5,
                ]
            ],
            $this->fieldValueFactor->toArray()
        );
    }
}
