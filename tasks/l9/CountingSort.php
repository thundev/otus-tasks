<?php
declare(strict_types=1);

namespace tasks\l9;

use tasks\l6\Sort;
use tasks\l8\MergeSort;

class CountingSort extends Sort
{
    public function sort(): void
    {
        $counts = $this->prepareCounts();

        foreach ($this->array as $i) {
            $counts[$i]++;
        }

        foreach ($counts as $i => $count) {
            $counts[$i] += $counts[$i - 1] ?? 0;
        }

        $output = [];
        for ($i = $this->n - 1; $i >= 0; $i--) {
            $index = --$counts[$this->array[$i]];
            $output[$index] = $this->array[$i];
        }

        foreach ($output as $index => $value) {
            $this->array[$index] = $value;
        }
    }

    private function prepareCounts(): array
    {
        $counts = [];
        $uniqueValues = [];

        foreach ($this->array as $i) {
            $uniqueValues[$i] = $i;
        }

        $sort = new MergeSort(array_values($uniqueValues));
        $sort->sort();

        foreach ($sort->getArray() as $i) {
            $counts[$i] = 0;
        }

        return $counts;
    }
}
