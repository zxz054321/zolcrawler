<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class RamType implements Filter
{
    public function apply($value)
    {
        $result  = [];
        $matches = [];

        if (preg_match('/(DDR\w+).*[^\d](\d+)MHz/', $value, $matches)) {
            $result['ram_type'] = $matches[1];
            $result['ram_freq'] = (int)$matches[2];
        }

        return $result;
    }
}