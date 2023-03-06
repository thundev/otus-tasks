<?php
declare(strict_types=1);

namespace tasks\l6;

class ShellSort extends Sort
{
    public function sort(): void
    {
        $length = count($this->array);

        for ($gap = (int)($length / 2); $gap > 0; $gap /= 2) {
            for ($i = $gap; $i < $length; $i++) {
                for ($j = $i; $j >= $gap && $this->array[$j - $gap] > $this->array[$j]; $j -= $gap) {
                    $this->swap($j - $gap, $j);
                }
            }
        }
    }
}
