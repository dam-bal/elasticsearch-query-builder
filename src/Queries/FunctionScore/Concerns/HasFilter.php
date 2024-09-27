<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\Concerns;

use Spatie\ElasticsearchQueryBuilder\Queries\Query;

trait HasFilter
{
    protected ?Query $filter = null;

    public function filter(Query $filter): self
    {
        $this->filter = $filter;

        return $this;
    }
}
