<?php

declare(strict_types = 1);

namespace Forceedge01\BDDStaticAnalyserRules\Entities;

class OutcomeCollection extends Collection
{
    public $summary = [
        'files' => 0,
        'backgrounds' => [],
        'scenarios' => [],
        'activeSteps' => [],
        'activeRules' => []
    ];

    public function setItems(array $items)
    {
        $this->items = $items;
    }

    public function addOutcome(Outcome $item)
    {
        $this->add($item);
    }

    public function addSummary(string $category, string $id)
    {
        $this->summary[$category][$id] = $id;
    }

    public function getSummary(string $key)
    {
        if (! isset($this->summary[$key])) {
            throw new \Exception('No such summary key ' . $key);
        }

        return $this->summary[$key];
    }

    public function getSummaryCount(string $key)
    {
        if (! isset($this->summary[$key])) {
            return 0;
        }

        return count($this->summary[$key]);
    }
}
