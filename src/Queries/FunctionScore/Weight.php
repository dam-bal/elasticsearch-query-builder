<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

final class Weight extends AbstractFunctionScoreFunction
{
    public static function create(float $weight): self
    {
        $self = new self();

        $self->weight = $weight;

        return $self;
    }

    protected function getFunctionName(): ?string
    {
        return null;
    }

    protected function buildFunction(): ?array
    {
        return null;
    }
}
