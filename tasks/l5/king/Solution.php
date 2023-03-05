<?php
declare(strict_types=1);

namespace tasks\l5\king;

use tester\Solver;

class Solution implements Solver
{
    public function solve(string ...$input): array
    {
        $index = (int)$input[0];

        $k = 1 << $index;
        $ka = $k & 0xfefefefefefefefe;
        $kh = $k & 0x7f7f7f7f7f7f7f7f;

        $movesBits =
            $ka <<  7 | $k << 8 | $kh << 9 |
            $ka >>  1 |           $kh << 1 |
            $ka >>  9 | $k >> 8 | $kh >> 7;

        return [
            (string)$this->countMoves($movesBits),
            (string)$movesBits
        ];
    }

    protected function countMoves(int $bits): int
    {
        $movesCount = 0;
        while ($bits !== 0)
        {
            $bits &= ($bits - 1);
            $movesCount ++;
        }

        return $movesCount;
    }
}
