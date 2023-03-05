<?php
declare(strict_types=1);

namespace tasks\l5\knight;

class Solution extends \tasks\l5\king\Solution
{
    public function solve(string ...$input): array
    {
        $index = (int)$input[0];

        $k = 1 << $index;
        $nA = 0xFeFeFeFeFeFeFeFe;
        $nAB = 0xFcFcFcFcFcFcFcFc;
        $nH = 0x7f7f7f7f7f7f7f7f;
        $nGH = 0x3f3f3f3f3f3f3f3f;

        $movesBits =
            $nGH & ($k <<  6 | $k >> 10)
            | $nH & ($k << 15 | $k >> 17)
            | $nA  & ($k << 17 | $k >> 15)
            | $nAB & ($k << 10 | $k >>  6);

        return [
            (string)$this->countMoves($movesBits),
            (string)$movesBits
        ];
    }
}
