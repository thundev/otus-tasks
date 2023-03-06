<?php
declare(strict_types=1);

namespace tasks\l7;

use tasks\l6\Sort;

class HeapSort extends Sort
{
    public function sort(): void
    {
        $length = count($this->array);

        for ($h = (int)($length / 2) - 1; $h >= 0; $h--) {
            $this->heapify($h, $length);
        }

        for ($j = $length - 1; $j > 0; $j--) {
            $this->swap(0, $j);
            $this->heapify(0, $j);
        }
    }

    private function heapify(int $root, int $size): void
    {
        $x = $root;
        $l = 2 * $x + 1;
        $r = 2 * $x + 2;

        if ($l < $size && $this->array[$l] > $this->array[$x]) {
            $x = $l;
        }

        if ($r < $size && $this->array[$r] > $this->array[$x]) {
            $x = $r;
        }

        if ($x === $root) {
            return;
        }

        $this->swap($root, $x);
        $this->heapify($x, $size);
    }
}
