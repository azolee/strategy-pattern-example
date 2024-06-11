### This code contains a startegy pattern implemented for a contest management system.

It is the implementation of the backend of a competition management system,
where the administrators can create different predefined competitions,
and the backend logic and also the UI will differ from strategy to strategy.

The `App\Models\Contest` has a `strategy` property stored in the database, and set by the Administrators on contest creation,
which holds the key of the applied strategy. This adds the functionality and UI logic to the contest. 

The relevant part of the Contest model is as follows:

```php
<?php

namespace App\Models;

use App\Extensions\Contests\ContestStrategy;
use App\Extensions\Contests\ContestStrategyMap;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public function getStrategy(): ContestStrategy
    {
        $map = ContestStrategyMap::create();
        return $map->getStrategyForKey($this->strategy, $this);
    }
}
```

The details of the functionalities of each of the strategy are stored in the `App/Extensions/Contests/Strategies/*/Features`
folders in various classes like `ValidationRules`, `ViewSection`, etc., and loaded through the code as follows:

```PHP
$validationRules = $contest->getStrategy()->executeFeature('validation-rules');

// or

$contestViewSection = $contest->getStrategy()->executeFeature('view-section');
$listElement = $contestViewSection?->getSectionByKey('list-element', compact($product));
```

Also, the `NoFeatureImplementedForStrategyException` it is handled in `app/Exceptions/Handler.php`.