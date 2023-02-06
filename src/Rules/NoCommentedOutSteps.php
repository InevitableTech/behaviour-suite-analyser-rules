<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class NoCommentedOutSteps extends BaseRule
{
    protected $violationMessage = 'In support of clean code, do not leave behind commented out code.';
    const REASON = '';

    public function applyOnStep(Entities\Step $step, Entities\OutcomeCollection $collection)
    {
        if (!$step->isActive()) {
            $collection->addOutcome($this->getStepOutcome(
                $step,
                $this->violationMessage,
                Entities\Outcome::MEDIUM
            ));
        }
    }
}
