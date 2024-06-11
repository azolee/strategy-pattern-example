<?php

namespace App\Extensions\Contests;

use App\Models\Contest;

interface HasContestInterface
{
    public function setContest(Contest $contest): self;
    public function getContest(): Contest;
}
