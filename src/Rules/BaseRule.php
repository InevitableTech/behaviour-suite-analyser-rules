<?php

namespace Forceedge01\BDDStaticAnalyserRules\Rules;

use Forceedge01\BDDStaticAnalyserRules\Entities\OutcomeCollection;
use Forceedge01\BDDStaticAnalyserRules\Entities\Outcome;
use Forceedge01\BDDStaticAnalyserRules\Entities\Background;
use Forceedge01\BDDStaticAnalyserRules\Entities\Scenario;
use Forceedge01\BDDStaticAnalyserRules\Entities\Step;
use Forceedge01\BDDStaticAnalyserRules\Entities\FeatureFileContents;

abstract class BaseRule implements RuleInterface
{
    const TYPE_SCENARIO = 'scenario';
    const TYPE_STEP = 'step';
    const TYPE_FEATURE = 'feature';
    const TYPE_TAG = 'tag';
    const TYPE_GENERAL = 'general';

    protected $violationMessage = '';

    protected $code = '';

    protected $description = '';

    private $featureFileContents = null;

    private $scenario = null;

    public function reset()
    {
        $this->featureFileContents = null;
        $this->scenario = null;

        return $this;
    }

    public function setFeatureFileContents(FeatureFileContents $contents)
    {
        $this->featureFileContents = $contents;
    }

    public function setScenario(Scenario $scenario = null)
    {
        $this->scenario = $scenario;
    }

    public function beforeApply(string $file, OutcomeCollection $collection)
    {
        return null;
    }

    public function applyOnFeature(FeatureFileContents $contents, OutcomeCollection $collection)
    {
        return null;
    }

    public function applyOnBackground(Background $background, OutcomeCollection $collection)
    {
        return null;
    }

    public function beforeApplyOnScenario(Scenario $scenario, OutcomeCollection $collection)
    {
        return null;
    }

    public function applyOnScenario(Scenario $scenario, OutcomeCollection $collection)
    {
        return null;
    }

    public function afterApplyOnScenario(Scenario $scenario, OutcomeCollection $collection)
    {
        $this->setScenario(null);
        return null;
    }

    public function beforeApplyOnStep(Step $step, OutcomeCollection $collection)
    {
        return null;
    }

    public function applyOnStep(Step $step, OutcomeCollection $collection)
    {
        return null;
    }

    public function afterApplyOnStep(Step $step, OutcomeCollection $collection)
    {
        return null;
    }

    public function applyAfterFeature(FeatureFileContents $contents, OutcomeCollection $collection)
    {
        return null;
    }

    public function getOutcomeObject(
        string $type,
        int $lineNumber,
        string $message,
        string $severity,
        string $violatingLine = null,
        string $rawStep = null,
        string $cleanStep = null
    ): Outcome {
        return new Outcome(
            $type,
            static::class,
            $this->featureFileContents->filePath,
            $lineNumber,
            $message,
            $severity,
            $this->scenario ? $this->scenario->getTitle() : null,
            $this->scenario ? $this->scenario->lineNumber : null,
            $violatingLine,
            $rawStep,
            $cleanStep
        );
    }

    protected function getScenarioOutcome(Scenario $scenario, string $message, int $outcome)
    {
        return $this->getOutcomeObject(
            self::TYPE_SCENARIO,
            $scenario->lineNumber,
            $message,
            $outcome,
            $scenario->getTitle()
        );
    }

    protected function getStepOutcome(Step $step, string $message, int $outcome)
    {
        return $this->getOutcomeObject(
            self::TYPE_STEP,
            $step->lineNumber,
            $message,
            $outcome,
            $step->trimmedTitle,
            $step->title,
            $step->getStepDefinition()
        );
    }
}
