<?php
declare(strict_types=1);

namespace tasks\l8;

use tasks\l6\Sort;

class QuickSort extends Sort
{
    public function sort(): void
    {
        $this->qsort(0, count($this->array) - 1);
    }

    private function qsort(int $l, int $r): void
    {
        if ($l >= $r) {
            return;
        }

        $m = $this->split($l, $r);
        $this->qsort($l, $m - 1);
        $this->qsort($m + 1, $r);
    }

    private function split(int $l, int $r): int
    {
        $p = $this->array[$r];
        $m = $l - 1;

        for ($j = $l; $j <= $r; $j++) {
            if ($this->array[$j] <= $p) {
                $this->swap(++$m, $j);
            }
        }

        return $m;
    }
}
