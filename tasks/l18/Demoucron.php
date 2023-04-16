<?php
declare(strict_types=1);

namespace tasks\l18;

use RuntimeException;

class Demoucron
{
    private array $av;

    public function setAdjacencyVector(array $vector): static
    {
        $this->av = $vector;

        return $this;
    }

    public function sort(): array
    {
        $vectorCount = count($this->av);
        $result = array_fill(0, $vectorCount, 0);

        foreach ($this->av as $vertices) {
            foreach ($vertices as $vertex) {
                $result[$vertex]++;
            }
        }

        $currentLevel = 0;
        $levels = [];
        $processed = 0;

        while ($processed < $vectorCount) {
            $levels[++$currentLevel] = [];
            foreach ($result as $key => $value) {
                if ($value === 0) {
                    $result[$key] = null;
                    $processed++;
                    $levels[$currentLevel][] = $key;
                }
            }

            if (count($levels[$currentLevel]) === 0) {
                throw new RuntimeException('Adjacency vector has a cycle.');
            }

            foreach ($levels[$currentLevel] as $vertex) {
                foreach ($this->av[$vertex] as $value) {
                    $result[$value]--;
                }
            }
        }

        return $levels;
    }
}
