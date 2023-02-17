<?php
declare(strict_types=1);

require_once 'tester/Solver.php';
require_once 'tester/Tester.php';
require_once 'tasks/l2/Solution.php';
require_once 'tasks/l3/primes/DividersSolution.php';
require_once 'tasks/l3/power/IterationSolution.php';
require_once 'tasks/l3/fibo/RecursiveSolution.php';
require_once 'tasks/l3/fibo/IterativeSolution.php';

use tasks\l2\Solution as L2Solution;
use tasks\l3\fibo\IterativeSolution;
use tasks\l3\power\IterationSolution;
use tasks\l3\primes\DividersSolution;
use tasks\l3\fibo\RecursiveSolution;
use tester\Tester;

// l2
//(new Tester(
//    new L2Solution(),
//    'tasks/l2/test'
//))->run();

// l3/power
//(new Tester(
//    new IterationSolution(),
//    'tasks/l3/power/test'
//))->run();

// l3/primes
//(new Tester(
//    new DividersSolution(),
//    'tasks/l3/primes/test'
//))->run();

(new Tester(
    new IterativeSolution(),
    'tasks/l3/fibo/test'
))->run();
