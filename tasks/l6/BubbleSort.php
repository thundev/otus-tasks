<?php
declare(strict_types=1);

namespace tasks\l6;

class BubbleSort extends Sort
{
    public function sort(): void
    {
        for ($j = count($this->array) - 1; $j >= 0; $j--) {
            for ($i = 0; $i < $j; $i++) {
                if ($this->array[$i] > $this->array [$i + 1]) {
                    $this->swap($i, $i + 1);
                }
            }
        }
    }
}
