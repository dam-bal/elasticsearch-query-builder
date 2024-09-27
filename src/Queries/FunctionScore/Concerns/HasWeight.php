<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\Concerns;

use Spatie\ElasticsearchQueryBuilder\Queries\Query;

trait HasWeight
{
    protected ?float $weight = null;

    public function weight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
