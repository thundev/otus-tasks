<?php
declare(strict_types=1);

namespace tasks\l6;

abstract class Sort
{
    protected int $n;

    public function __construct(
        protected array $array,
    )
    {
        $this->n = count($this->array);
    }

    public function getArray(): array
    {
        return $this->array;
    }

    protected function swap(int $x, int $y): void
    {
        $temp = $this->array[$x];
        $this->array[$x] = $this->array[$y];
        $this->array[$y] = $temp;
    }

    abstract public function sort(): void;
}
