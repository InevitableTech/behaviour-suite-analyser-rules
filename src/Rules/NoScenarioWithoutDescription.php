<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class NoScenarioWithoutDescription extends BaseRule
{
    protected $violationMessage = 'Scenario without description, please add description for scenario.';

    public function applyOnScenario(Entities\Scenario $scenario, Entities\OutcomeCollection $collection)
    {
        $title = $scenario->getTitle();

        if (! $title) {
            $collection->addOutcome($this->getOutcomeObject(
                self::TYPE_SCENARIO,
                $scenario->lineNumber,
                $this->violationMessage,
                Entities\Outcome::LOW
            ));
        }
    }
}
