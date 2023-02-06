<?php

declare(strict_types = 1);

namespace Forceedge01\BDDStaticAnalyserRules\Entities;

class FeatureFileContents
{
    public function __construct(
        array $raw,
        string $filePath,
        Feature $feature,
        ?Background $background,
        array $scenarios
    ) {
        $this->raw = $raw;
        $this->filePath = $filePath;
        $this->feature = $feature;
        $this->background = $background;
        $this->scenarios = $scenarios;
    }
}
