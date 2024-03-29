<?php

declare(strict_types = 1);

namespace Forceedge01\BDDStaticAnalyserRules\Entities;

class Outcome
{
    // Informational.
    const LOW = 0;

    // Cleanup related.
    const MEDIUM = 1;

    // Maintainability issues.
    const HIGH = 2;

    // Reliability/Speed issues.
    const SERIOUS = 3;

    // Architectural issues.
    const CRITICAL = 4;

    // Debug issues.
    const DEV = 99;

    public function __construct(
        string $type,
        string $rule,
        string $file,
        int $lineNumber,
        string $message,
        string $severity,
        string $scenario = null,
        int $scenarioLineNumber = null,
        string $violatingLine = null,
        string $rawStep = null,
        string $cleanStep = null
    ) {
        $this->type = $type;
        $this->rule = $rule;
        $this->file = $file;
        $this->lineNumber = $lineNumber;
        $this->severity = $severity;
        $this->scenario = $scenario;
        $this->scenarioLineNumber = $scenarioLineNumber;
        $this->violatingLine = $violatingLine;
        $this->rawStep = $rawStep;
        $this->message = $message;
        $this->cleanStep = $cleanStep;
        $this->uniqueScenarioId = $file . ':' . $lineNumber;
    }

    public function getRuleShortName(): string
    {
        $shortName = explode('\\', $this->rule);
        return end($shortName);
    }
}
