<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class Price implements Filter
{
    public function apply($value)
    {
        if (is_numeric($value)) {
            return (int)$value;
        }

        if (str_contains($value, '万')) {
            return intval($value * 10000);
        }

        return -1;
    }
}