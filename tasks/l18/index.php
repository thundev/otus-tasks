<?php
declare(strict_types=1);

require_once 'Demoucron.php';

use tasks\l18\Demoucron;

$demoucron = new Demoucron();


//     0 1 2 3 4 5 6 7
//     A B C D E F G H
// 0 A . 1 . . . . . .
// 1 B . . . . 1 . . .
// 2 C . . . 1 . . . .
// 3 D 1 1 . . 1 1 . .
// 4 E . . . . . . 1 .
// 5 F . . . . . . . 1
// 6 G . . . . . . . 1
// 7 H . . . . . . . .
$demoucron->setAdjacencyVector([
    [1],
    [4],
    [3],
    [0, 1, 4, 5],
    [6],
    [7],
    [7],
    [],
]);

$result = $demoucron->sort();
assert($result[1] === [2]);
assert($result[2] === [3]);
assert($result[3] === [0, 5]);
assert($result[4] === [1]);
assert($result[5] === [4]);
assert($result[6] === [6]);
assert($result[7] === [7]);

//     0 1 2
//     A B C
// 0 A . 1 .
// 1 B . . 1
// 2 C 1 . .
$demoucron->setAdjacencyVector([
    [1],
    [2],
    [0],
]);
try {
    $demoucron->sort();
} catch (RuntimeException $e) {
    echo "Exception caught: {$e->getMessage()}" . PHP_EOL;
}

