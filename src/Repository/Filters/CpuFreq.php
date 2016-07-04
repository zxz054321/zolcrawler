<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

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