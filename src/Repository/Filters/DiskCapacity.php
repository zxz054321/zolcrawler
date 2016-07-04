<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class DiskCapacity implements Filter
{
    public function apply($value)
    {
        if (strpos($value, 'TB') !== false) {
            $value = $value * 1000;
        }

        return (int)$value;
    }
}