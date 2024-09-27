<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries\FunctionScore;

final class FieldValueFactor extends AbstractFunctionScoreFunction
{
    public static function create(string $field): self
    {
        return new self($field);
    }

    public function __construct(
        private string $field,
        private ?float $factor = null,
        private ?string $modifier = null,
        private mixed $missing = null
    ) {
    }

    public function factor(float $factor): self
    {
        $this->factor = $factor;

        return $this;
    }

    public function modifier(string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function missing(mixed $missing): self
    {
        $this->missing = $missing;

        return $this;
    }

    protected function getFunctionName(): ?string
    {
        return 'field_value_factor';
    }

    protected function buildFunction(): ?array
    {
        return [
            'field' => $this->field,
            'factor' => $this->factor,
            'modifier' => $this->modifier,
            'missing' => $this->missing,
        ];
    }
}
