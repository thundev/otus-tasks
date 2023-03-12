<?php
declare(strict_types=1);

namespace tasks\l9;

use tasks\l6\Sort;

class RadixSort extends Sort
{
    public function sort(): void
    {
        $max = strlen((string)max($this->array));

        for ($r = 1; $r < 10 ** $max; $r *= 10) {
            $counts = array_fill(0, 10, 0);

            foreach ($this->array as $i) {
                $digit = ((int)($i / $r)) % 10;
                $counts[$digit]++;
            }

            foreach ($counts as $i => $count) {
                $counts[$i] += $counts[$i - 1] ?? 0;
            }

            $output = [];
            for ($i = $this->n - 1; $i >= 0; $i--) {
                $digit = ((int)($this->array[$i] / $r)) % 10;
                $index = --$counts[$digit];
                $output[$index] = $this->array[$i];
            }

            foreach ($output as $index => $value) {
                $this->array[$index] = $value;
            }
        }
    }
}
