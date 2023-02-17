<?php
declare(strict_types=1);

namespace tester;

interface Solver
{
    public function solve(string ...$input): string;
}
