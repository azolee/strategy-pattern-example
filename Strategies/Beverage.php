<?php

namespace App\Extensions\Contests\Strategies;

use App\Constants\Tag;
use App\Extensions\Contests\AbstractContestStrategy;
use App\Extensions\Contests\ContestStrategyMap;

final class Beverage extends AbstractContestStrategy
{
    public static function getTags(): array
    {
        return [Tag::AKOVITA];
    }

    public function getKey(): string
    {
        return ContestStrategyMap::BEVERAGE;
    }
}
