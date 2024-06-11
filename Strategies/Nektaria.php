<?php

namespace App\Extensions\Contests\Strategies;

use App\Constants\Tag;
use App\Extensions\Contests\AbstractContestStrategy;
use App\Extensions\Contests\ContestStrategyMap;

class Nektaria extends AbstractContestStrategy
{
    public static function getTags(): array
    {
        return [Tag::NEKTARIA];
    }

    public function getKey(): string
    {
        return ContestStrategyMap::NEKTARIA;
    }
}
