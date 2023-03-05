<?php
declare(strict_types=1);

require_once 'tester/Solver.php';
require_once 'tester/Tester.php';
require_once 'tasks/l5/king/Solution.php';
require_once 'tasks/l5/knight/Solution.php';

use tasks\l5\knight\Solution;
use tester\Tester;

(new Tester(
    new Solution(),
    'tasks/l5/knight/test'
))->run();
