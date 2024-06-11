<?php
namespace App\Extensions\Contests\Strategies\beverage\Features;

use App\Extensions\Contests\Strategies\AbstractStrategyFeature;

class ValidationRules extends AbstractStrategyFeature
{
    private array $validationRules = [
        'use_alcohol_content' => ['required', 'boolean'],
        'minimum_score_for_bronze' => ['required', 'integer'],
        'minimum_score_for_silver' => ['required', 'integer'],
        'minimum_score_for_gold' => ['required', 'integer'],
        'minimum_score_for_champion' => ['required', 'integer'],
        'error_percentage_for_evaluations' => ['required', 'integer'],
    ];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->validationRules;
    }

}