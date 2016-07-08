<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class ToFloat implements Filter
{
    public function apply($value)
    {
        return (float)$value;
    }
}