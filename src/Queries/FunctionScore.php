<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries;

use Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore\FunctionScoreFunction;

class FunctionScore implements Query
{
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param FunctionScoreFunction[] $functions
     */
    public function __construct(
        private ?Query $query = null,
        private ?string $scoreMode = null,
        private ?string $boostMode = null,
        private mixed $boost = null,
        private array $functions = []
    ) {
    }

    public function addFunction(FunctionScoreFunction $functionScoreFunction): self
    {
        $this->functions[] = $functionScoreFunction;

        return $this;
    }

    public function scoreMode(string $scoreMode): self
    {
        $this->scoreMode = $scoreMode;

        return $this;
    }

    public function boostMode(string $boostMode): self
    {
        $this->boostMode = $boostMode;

        return $this;
    }

    public function boost(mixed $boost): self
    {
        $this->boost = $boost;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
                'query' => $this->query?->toArray(),
                'functions' => $this->functions,
                'score_mode' => $this->scoreMode,
                'boost_mode' => $this->boostMode,
                'boost' => $this->boost,
            ]
        );
    }
}
