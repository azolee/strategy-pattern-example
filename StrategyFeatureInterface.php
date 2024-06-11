<?php

namespace App\Extensions\Contests;

use App\Models\Contest;

interface StrategyFeatureInterface
{
    public function handleWithArguments(array $arguments): self;
}
