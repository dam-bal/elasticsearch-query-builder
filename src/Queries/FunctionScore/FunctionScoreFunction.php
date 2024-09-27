<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

interface FunctionScoreFunction
{
    public function toArray(): array;
}
