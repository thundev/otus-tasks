<?php
declare(strict_types=1);

require_once 'tester/Solver.php';
require_once 'tester/Tester.php';
require_once 'tasks/l2/Solution.php';

use tasks\l2\Solution;
use tester\Tester;

(new Tester(
    new Solution(),
    'tasks/l2/test'
))->run();
