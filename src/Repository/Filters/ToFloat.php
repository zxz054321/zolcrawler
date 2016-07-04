<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class ToFloat implements Filter
{
    public function apply($value)
    {
        return (float)$value;
    }
}