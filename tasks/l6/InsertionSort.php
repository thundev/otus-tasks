<?php
declare(strict_types=1);

namespace tasks\l6;

class InsertionSort extends Sort
{
    public function sort(): void
    {
        for ($j = 0, $jMax = count($this->array); $j < $jMax; $j++) {
            for ($i = $j - 1; $i > 0 && $this->array[$i] > $this->array[$i + 1]; $i--) {
                $this->swap($i, $i + 1);
            }
        }
    }
}
