<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities\OutcomeCollection;
use Forceedge01\BDDStaticAnalyserRules\Entities\Outcome;
use Forceedge01\BDDStaticAnalyserRules\Entities\Background;
use Forceedge01\BDDStaticAnalyserRules\Entities\Scenario;
use Forceedge01\BDDStaticAnalyserRules\Entities\Step;
use Forceedge01\BDDStaticAnalyserRules\Entities\FeatureFileContents;

interface RuleInterface
{
    public function setFeatureFileContents(FeatureFileContents $contents);

    public function setScenario(Scenario $scenario = null);

    public function beforeApply(string $file, OutcomeCollection $collection);

    public function applyOnFeature(FeatureFileContents $contents, OutcomeCollection $collection);

    public function applyOnBackground(Background $background, OutcomeCollection $collection);

    public function beforeApplyOnScenario(Scenario $scenario, OutcomeCollection $collection);

    public function applyOnScenario(Scenario $scenario, OutcomeCollection $collection);

    public function afterApplyOnScenario(Scenario $scenario, OutcomeCollection $collection);

    public function beforeApplyOnStep(Step $step, OutcomeCollection $collection);

    public function applyOnStep(Step $step, OutcomeCollection $collection);

    public function afterApplyOnStep(Step $step, OutcomeCollection $collection);
}
