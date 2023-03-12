<?php
declare(strict_types=1);

namespace tasks\l9;

class LinkedList
{
    public function __construct(
        public int $value,
        public ?LinkedList $next,
    )
    {
    }
}
