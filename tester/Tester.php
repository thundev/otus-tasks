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

            $expected = trim(file_get_contents($outPath));
            $tests = file($inPath, FILE_SKIP_EMPTY_LINES);

            foreach ($tests as $test) {
                $result = $this->solver->solve($test);
                echo $expected === $result
                    ? "Test $iteration: Success"
                    : "Test $iteration: Failure - ($expected != $result)";

                echo PHP_EOL;
            }

            $iteration++;
        }
    }
}
