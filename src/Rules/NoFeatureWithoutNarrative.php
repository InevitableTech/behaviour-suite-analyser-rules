<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class NoFeatureWithoutNarrative extends BaseRule
{
    protected $violationMessage = 'Feature has no narrative. A narrative should set the context (I want), the user role (As a) and the benefit (So that/In order) to be held by the feature.';

    public function applyOnFeature(Entities\FeatureFileContents $contents, Entities\OutcomeCollection $collection)
    {
        $narrative = $contents->feature->getNarrative();

        if (! $narrative) {
            $collection->addOutcome($this->getOutcomeObject(
                1,
                $this->violationMessage,
                Entities\Outcome::SERIOUS
            ));
        }
    }
}
