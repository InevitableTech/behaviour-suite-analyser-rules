<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class NotTooManyScenariosPerFeature extends BaseRule
{
    protected $violationMessage = 'Feature file "%s" should not have more than %d scenarios, got %d.';

    public function __construct(array $options)
    {
        $this->maxCount = $options[0];
    }

    public function applyOnFeature(Entities\FeatureFileContents $contents, Entities\OutcomeCollection $collection)
    {
        $scenariosCount = $contents->scenarios;
        if (count($scenariosCount) > $this->maxCount) {
            $collection->addOutcome($this->getOutcomeObject(
                self::TYPE_GENERAL,
                1,
                sprintf($this->violationMessage, $contents->filePath, $this->maxCount, $scenariosCount),
                Entities\Outcome::MEDIUM
            ));
        }
    }
}
