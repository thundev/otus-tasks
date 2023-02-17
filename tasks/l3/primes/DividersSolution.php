<?php
declare(strict_types=1);

namespace tasks\l3\primes;

use tester\Solver;

class DividersSolution implements Solver
{
    public function solve(string ...$input): string
    {
        $number = (int)$input[0];

        if ($number < 2) {
            return '0';
        }

        $count = 0;
        for ($i = 2; $i <= $number; $i++) {
            $count += $this->isPrime($i) ? 1 : 0;
        }

        return (string)$count;
    }

    private function isPrime(int $n): bool
    {
        $count = 0;
        for ($i = 1; $i <= $n; $i++) {
            $count += ($n % $i === 0) ? 1 : 0;
        }

        return $count === 2;
    }
}
