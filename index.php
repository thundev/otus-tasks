<?php
declare(strict_types=1);

require_once 'tasks/l6/Sort.php';
require_once 'tasks/l8/MergeSort.php';
require_once 'tasks/l9/LinkedList.php';
require_once 'tasks/l9/BucketSort.php';
require_once 'tasks/l9/RadixSort.php';

use tasks\l9\RadixSort;

$array = [];
for ($i = 0; $i < 1000; $i++) {
    $array[] = random_int(10, 9999);
}

$sort = new RadixSort($array);
$sort->sort();

var_dump($sort->getArray());
die();

