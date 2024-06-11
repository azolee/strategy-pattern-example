<?php

namespace App\Extensions\Contests\Strategies;

use App\Extensions\Contests\HasContestInterface;
use App\Extensions\Contests\StrategyFeatureInterface;
use App\Models\Contest;

abstract class AbstractStrategyFeature implements HasContestInterface, StrategyFeatureInterface
{
    protected ?Contest $contest = null;

    public function getContest(): Contest
    {
        return $this->contest;
    }

    public function setContest(Contest $contest): HasContestInterface
    {
        $this->contest = $contest;
        return $this;
    }

    public function handleWithArguments(array $arguments = []): StrategyFeatureInterface
    {
        $this->arguments = $arguments;
        return $this;
    }
}