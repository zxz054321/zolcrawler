<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class CpuFreq implements Filter
{
    public function apply($value)
    {
        if (strpos($value, 'GHz') !== false) {
            $value = $value * 1000;
        }

        return (int)$value;
    }
}