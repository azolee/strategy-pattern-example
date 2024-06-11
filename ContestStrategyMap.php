<?php

namespace App\Extensions\Contests;

use App\Constants\Tag;
use App\Extensions\Container;
use App\Extensions\Contests\Strategies\Beverage;
use App\Extensions\Contests\Strategies\Nektaria;
use App\Models\Contest;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ContestStrategyMap extends Container
{
    public const BEVERAGE = 'beverage';
    public const NEKTARIA = 'nektaria';

    protected array $data = [
        self::BEVERAGE => Beverage::class,
        self::NEKTARIA => Nektaria::class,
    ];

    protected array $titles = [
        self::NEKTARIA => 'Nektaria',
        self::BEVERAGE => 'Beverages',
    ];

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function getStrategyForKey(string $key, Contest $contest): ContestStrategy
    {
        $class = $this->get($key);
        if (!class_exists($class)) {
            throw new Exception(message: 'No strategy implemented');
        }
        return new $class($contest);
    }

    public function getByTag(Tag $tag): array
    {
        $strategyResults = [];

        $allStrategies = $this->getData();
        /** @var AbstractContestStrategy $strategy */
        foreach ($allStrategies as $strategy) {
            if (in_array($tag, $strategy::getTags())) {
                $strategyResults[] = $strategy;
            }
        }
        return $strategyResults;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getTitles(): array
    {
        return $this->titles;
    }
}
