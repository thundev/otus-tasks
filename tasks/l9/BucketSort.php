<?php
declare(strict_types=1);

namespace tasks\l9;

use tasks\l6\Sort;

class BucketSort extends Sort
{
    public function sort(): void
    {
        $max = $this->findMax();

        /** @var LinkedList[] $buckets */
        $buckets = array_fill(0, $this->n, null);

        foreach ($this->array as $i) {
            $b = (int)(($i * $this->n) / $max);
            $buckets[$b] = new LinkedList($i, $buckets[$b] ?? null);
            $list = $buckets[$b];

            while($list->next !== null) {
                if ($list->value < $list->next->value) {
                    break;
                }
                $x = $list->value;
                $list->value = $list->next->value;
                $list->next->value = $x;
                $list = $list->next;
            }
        }

        $i = 0;
        foreach ($buckets as $bucket) {
            $list = $bucket;

            while ($list !== null) {
                $this->array[$i++] = $list->value;
                $list = $list->next;
            }
        }
    }

    private function findMax(): int
    {
        $max = $this->array[0];

        for ($i = 1; $i < $this->n; $i++) {
            $max = max($max, $this->array[$i]);
        }

        return $max;
    }
}
