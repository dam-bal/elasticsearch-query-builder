<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\Concerns\HasFilter;
use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\Concerns\HasWeight;

abstract class AbstractFunctionScoreFunction implements FunctionScoreFunction
{
    use HasWeight;
    use HasFilter;

    abstract protected function getFunctionName(): ?string;

    abstract protected function buildFunction(): ?array;

    public function toArray(): array
    {
        return array_filter(
            [
                'filter' => $this->filter?->toArray(),
                'weight' => $this->weight,
                $this->getFunctionName() => $this->buildFunction(),
            ]
        );
    }
}
