<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities;

class UnsupportedTags extends BaseRule
{
    protected $violationMessage = 'Unsupported tag(s) "%s" found.';

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    public function applyOnFeature(Entities\FeatureFileContents $contents, Entities\OutcomeCollection $collection)
    {
        $tags = $contents->feature->getTags();
        $intersect = array_intersect($this->tags, $tags);

        if ($intersect) {
            $collection->addOutcome($this->getOutcomeObject(
                1,
                sprintf($this->violationMessage, implode(', ', $intersect)),
                Entities\Outcome::MEDIUM,
                $contents->feature->narrative[0]
            ));
        }
    }

    public function applyOnScenario(Entities\Scenario $scenario, Entities\OutcomeCollection $collection)
    {
        $tags = $scenario->getTags();
        $intersect = array_intersect($this->tags, $tags);

        if ($intersect) {
            $collection->addOutcome($this->getOutcomeObject(
                $scenario->lineNumber,
                sprintf($this->violationMessage, implode(', ', $intersect)),
                Entities\Outcome::MEDIUM,
                $scenario->scenario[0]
            ));
        }
    }
}
