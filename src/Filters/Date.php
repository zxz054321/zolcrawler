<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class Date implements Filter
{
    public function apply($value)
    {
        $value = str_replace('[', '', $value);
        $value = str_replace(']', '', $value);

        return strtotime($value);
    }
}