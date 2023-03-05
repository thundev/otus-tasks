<?php
declare(strict_types=1);

namespace tester;

readonly class Tester
{
    public function __construct(
        private Solver $solver,
        private string $directoryPath,
    )
    {
    }

    public function run(): void
    {
        $iteration = 0;

        while(true) {
            $inPath = "$this->directoryPath/test.$iteration.in";
            $outPath = "$this->directoryPath/test.$iteration.out";

            if (!file_exists($inPath) || !file_exists($outPath)) {
                echo 'No test found!' . PHP_EOL;
                return;
            }

            $in = file($inPath, FILE_SKIP_EMPTY_LINES);
            $out = file($outPath, FILE_SKIP_EMPTY_LINES);

            if (!$in || !$out) {
                continue;
            }

            $in = array_map('trim', $in);
            $out = array_map('trim', $out);

            $result = $this->solver->solve(...$in);

            $succeeded = false;

            for ($i = 0, $iMax = count($out); $i < $iMax; $i++) {
                $succeeded = $result[$i] === $out[$i];
                if (!$succeeded) {
                    echo "Test $iteration: Failure - (" . implode(",", $out) . " != " . implode(",", $result) . ")";
                    break;
                }
            }

            if ($succeeded) {
                echo "Test $iteration: Success";
            }

            echo PHP_EOL;

            $iteration++;
        }
    }
}
