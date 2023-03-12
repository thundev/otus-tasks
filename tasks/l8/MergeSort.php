<?php
declare(strict_types=1);

namespace tasks\l8;

use tasks\l6\Sort;

class MergeSort extends Sort
{
    public function sort(): void
    {
        $this->msort(0, count($this->array) - 1);
    }

    private function msort(int $l, int $r): void
    {
        if ($l >= $r) {
            return;
        }

        $m = (int)(($l + $r) / 2);
        $this->msort($l, $m);
        $this->msort($m + 1, $r);
        $this->merge($l, $m, $r);
    }

    private function merge(int $l, int $m, int $r): void
    {
        $tmp = [];
        $a = $l;
        $b = $m + 1;
        $t = 0;

        while ($a <= $m && $b <= $r) {
            $tmp[$t++] = $this->array[$a] < $this->array[$b]
                ? $this->array[$a++]
                : $this->array[$b++];
        }

        while ($a <= $m) {
            $tmp[$t++] = $this->array[$a++];
        }

        while ($b <= $r) {
            $tmp[$t++] = $this->array[$b++];
        }

        for ($i = $l; $i <= $r; $i++) {
            $this->array[$i] = $tmp[$i - $l];
        }
    }
}
