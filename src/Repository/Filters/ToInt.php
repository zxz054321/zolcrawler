<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class ToInt implements Filter
{
    public function apply($value)
    {
        return (int)$value;
    }
}