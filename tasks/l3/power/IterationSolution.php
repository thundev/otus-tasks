<?php
declare(strict_types=1);

namespace tasks\l3\power;

use tester\Solver;

class IterationSolution implements Solver
{
    public function solve(string ...$input): string
    {
        $number = (float)$input[0];
        $power = (int)$input[1];

        if ($power === 0) {
            return '1.0';
        }

        $result = $number;
        for($i = 1; $i < $power; $i++) {
            $result *= $number;
        }

        $result = (string)$result;

        if (!str_contains($result, '.')) {
            $result .= '.0';
        }

        return $result;
    }
}
