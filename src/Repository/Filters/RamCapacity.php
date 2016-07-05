<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class RamCapacity implements Filter
{
    public function apply($value)
    {
        $result  = [];
        $matches = [];

        if (preg_match('/(\d+)GB（(.+)）/',$value,$matches)) {
            $result['ram_capacity']=(int) $matches[1];
            $result['ram_description']=$matches[2];
        }

        return $result;
    }
}