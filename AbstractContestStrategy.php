<?php

namespace App\Extensions\Contests;

use App\Exceptions\Strategies\NoFeatureImplementedForStrategyException;
use App\Extensions\Contests\StrategyFeature;
use App\Models\Contest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

abstract class AbstractContestStrategy implements ContestStrategy
{
    public function __construct(
        protected Contest $contest,
    ) {}

    abstract public function getKey(): string;

    abstract public static function getTags(): array;

    /**
     * @throws NoFeatureImplementedForStrategyException
     */
    public function executeFeature(string $featureName, ... $additionalArguments): StrategyFeature
    {
        $classNameForFeature = $this->getFullyQualifiedClassnameFor($featureName);

        if ($this->resolve($classNameForFeature) === true) {
            return (new $classNameForFeature())->setContest($this->contest)->handleWithArguments($additionalArguments);
        }

        throw new NoFeatureImplementedForStrategyException(
            'No feature implemented for the ' . $this->contest->getStrategy()->getKey() . " contest type.",
            $this->contest
        );
    }

    private function getFullyQualifiedClassnameFor(string $feature): string
    {
        return "App\\Extensions\\Contests\\"
            . Str::lower($this->contest->getStrategy()->getKey())
            . "\\Features\\"
            . Str::studly($feature);
    }

    private function resolve(string $classNameForFeature): bool
    {
        return class_exists($classNameForFeature)
            && ($classNameForFeature instanceof StrategyFeatureInterface::class)
            && ($classNameForFeature instanceof HasContestInterface::class);
    }
}
