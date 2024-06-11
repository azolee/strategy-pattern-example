<?php
namespace App\Extensions\Contests\Strategies\nektaria\Features;

use App\Extensions\Contests\Strategies\AbstractStrategyFeature;

class ValidationRules extends AbstractStrategyFeature
{
    private array $validationRules = [
        'minimum_score_for_bronze' => ['required', 'integer'],
        'minimum_score_for_silver' => ['required', 'integer'],
        'minimum_score_for_gold' => ['required', 'integer'],
        'error_percentage_for_evaluations' => ['required', 'integer'],
        'minimum_chars_for_review' => ['required', 'integer'],
        'points_by_default' => ['required', 'integer'],
    ];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->validationRules;
    }
}