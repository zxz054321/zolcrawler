<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class CpuNumber implements Filter
{
    public function apply($value)
    {
        $result = [];

        if (strpos($value, 'Intel') === 0) {
            $matches             = [];
            $result['cpu_brand'] = 'intel';

            preg_match('/Intel (.+) ([\w]+)/', $value, $matches);

            $result['cpu_series'] = str_replace('酷睿', '', $matches[1]);
            $result['cpu_number'] = $matches[2];
        } elseif (strpos($value, 'AMD') === 0) {
            $result['cpu_brand'] = 'amd';
        }

        return $result;
    }
}