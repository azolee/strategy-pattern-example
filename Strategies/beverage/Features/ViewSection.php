<?php

namespace App\Extensions\Contests\Strategies\beverage\Features;

use App\Extensions\Contests\Strategies\AbstractStrategyFeature;
use Illuminate\Support\Facades\View;

class ViewSection extends AbstractStrategyFeature
{
    public function getSectionByKey(string $sectionKey, array $data = [])
    {
        $view = 'contest.strategies.' . $this->getContest()->getStrategy()->getKey(). '.sections.' . $sectionKey;

        if (View::exists($view)) {
            return view($view, $data);
        }

        return null;
    }
}