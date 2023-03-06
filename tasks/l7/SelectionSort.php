<?php
declare(strict_types=1);

namespace tasks\l7;

use tasks\l6\Sort;

class SelectionSort extends Sort
{
    public function sort(): void
    {
        for ($j = count($this->array) - 1; $j > 0; $j--) {
            $this->swap($this->findMax($j), $j);
        }
    }

    private function findMax(int $j): int
    {
        $max = 0;
        for ($i = 1; $i <= $j; $i++) {
            if ($this->array[$i] > $this->array[$max]) {
                $max = $i;
            }
        }

        return $max;
    }
}
