<?php

namespace App\Extensions\Contests\Strategies\nektaria\Features;

use App\Extensions\Contests\Strategies\AbstractStrategyFeature;
use Illuminate\Support\Facades\View;

class ViewSection extends AbstractStrategyFeature
{
    public function getSectionByKey(string $section, array $data = [])
    {
        $view = 'contest.partials.strategies.' . $this->getContest()->getStrategy()->getKey(). '.' . $section;

        if (View::exists($view)) {
            return view($view, $data);
        }

        return null;
    }
}