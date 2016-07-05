<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class CpuNumber implements Filter
{
    public function apply($value)
    {
        $result  = [];
        $matches = [];

        if (strpos($value, 'Intel') === 0) {
            $result['cpu_brand'] = 'intel';

            preg_match('/Intel (.+) ([\w]+)/', $value, $matches);

            $result['cpu_series'] = $matches[1];
            $result['cpu_number'] = $matches[2];
        } elseif (strpos($value, 'AMD') === 0) {
            $result['cpu_brand'] = 'amd';

            if (preg_match('/AMD (\w+)-(\w+)/', $value, $matches)
                or
                preg_match('/AMD (\w+) ([\w-]+)/', $value, $matches)
            ) {
                $result['cpu_series'] = $matches[1];
                $result['cpu_number'] = $matches[2];
            }
        }

        return $result;
    }
}