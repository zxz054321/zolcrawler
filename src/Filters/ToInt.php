<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class ToInt implements Filter
{
    public function apply($value)
    {
        return (int)$value;
    }
}