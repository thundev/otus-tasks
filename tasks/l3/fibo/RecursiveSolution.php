<?php
declare(strict_types=1);

namespace tasks\l3\fibo;

use tester\Solver;

class RecursiveSolution implements Solver
{
    public function solve(string ...$input): string
    {
        $n = (int)$input[0];
        return (string)$this->fibonacci($n);
    }

    private function fibonacci(int $n) {
        if ($n < 2) {
            return $n;
        }

        return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }
}
