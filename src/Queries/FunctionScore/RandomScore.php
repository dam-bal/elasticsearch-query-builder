<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

final class RandomScore implements FunctionScoreFunction
{
    public static function create(int $seed, string $field): self
    {
        return new self($seed, $field);
    }

    public function __construct(
        private int $seed,
        private string $field,
    ) {
    }

    public function toArray(): array
    {
        return [
            'random_score' => [
                'seed' => $this->seed,
                'field' => $this->field,
            ]
        ];
    }
}
