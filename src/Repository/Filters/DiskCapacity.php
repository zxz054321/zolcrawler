<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class DiskCapacity implements Filter
{
    public function apply($value)
    {
        $matches = [];

        if (preg_match_all('/\d+[GT]B/', $value, $matches)) {
            $max = 0;

            foreach ($matches[0] as $capacity) {
                $capacity = $this->toGb($capacity);
                $max      = $capacity > $max ? $capacity : $max;
            }

            $value = $max;
        }

        return (int)$value;
    }

    protected function toGb($value)
    {
        if (str_contains($value, 'TB')) {
            $value = $value * 1000;
        }

        return (int)$value;
    }
}