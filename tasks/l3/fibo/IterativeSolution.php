<?php
declare(strict_types=1);

namespace tasks\l3\fibo;

use tester\Solver;

class IterativeSolution implements Solver
{
    public function solve(string ...$input): string
    {
        $n = (int)$input[0];

        if ($n <= 1) {
            return '1';
        }

        $prev1 = 0;
        $prev2 = 1;
        $result = 0;
        for ($i = 2; $i <= $n; $i++) {
            $result = $prev1 + $prev2;
            $prev1 = $prev2;
            $prev2 = $result;
        }

        return (string)$result;
    }
}
