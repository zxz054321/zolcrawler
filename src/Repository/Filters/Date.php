<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class Date implements Filter
{
    public function apply($value)
    {
        $value = str_replace('[', '', $value);
        $value = str_replace(']', '', $value);

        return strtotime($value);
    }
}