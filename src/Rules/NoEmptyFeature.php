<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class NoEmptyFeature extends BaseRule
{
    protected $violationMessage = 'Feature file "%s" does not contain any scenarios, are you missing coverage?';

    public function applyOnFeature(Entities\FeatureFileContents $contents, Entities\OutcomeCollection $collection)
    {
        $scenariosCount = $contents->scenarios;

        if (count($scenariosCount) === 0) {
            $collection->addOutcome($this->getOutcomeObject(
                self::TYPE_FEATURE,
                $contents->feature->lineNumber,
                sprintf($this->violationMessage, $contents->filePath),
                Entities\Outcome::SERIOUS
            ));
        }
    }
}
