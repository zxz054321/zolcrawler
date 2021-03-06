<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class Status implements Filter
{
    public function apply($value)
    {
        $match = [
            '即将上市' => 'upcoming',
            '概念产品' => 'conceptual',
        ];

        if (isset($match[ $value ])) {
            return $match[ $value ];
        }

        if (preg_match('/\[停产\]|停产/', $value)) {
            return 'discontinued';
        }

        return 'normal';
    }
}