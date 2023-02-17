<?php
declare(strict_types=1);

namespace tasks\l2;

use tester\Solver;

class Solution implements Solver
{
    private array $memo = [];

    public function solve(string ...$input): string
    {
        $numDigits = (int)$input[0];
        $maxSum = 9 * $numDigits;

        $values = $this->getValues($numDigits, $maxSum);

        $result = array_reduce($values, static function (int $carry, int $current) {
            $carry += ($current * $current);
            return $carry;
        }, 0);

        return (string)$result;
    }

    private function getValues(int $numDigits, int $max): array
    {
        if (isset($this->memo[$numDigits])) {
            return $this->memo[$numDigits];
        }

        if ($numDigits === 1) {
            $this->memo[$numDigits] = array_fill(0, 10, 1);
            return $this->memo[$numDigits];
        }

        $values = $this->getValues($numDigits - 1, $max);

        $this->memo[$numDigits] = array_reduce(range(0, $max), static function (array $carry, int $x) use ($values) {
            $carry[$x] = array_reduce(range(0, 9), static function($carry, $y) use ($values, $x) {
                $carry += $values[$x - $y] ?? 0;
                return $carry;
            }, 0);

            return $carry;
        }, []);

        return $this->memo[$numDigits];
    }
}
