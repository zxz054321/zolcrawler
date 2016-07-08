<?php

namespace AbelHalo\ZolCrawler\Filters;

use AbelHalo\ZolCrawler\Contracts\Filter;

class DiskCapacity implements Filter
{
    public function apply($value)
    {
        $result  = [];
        $matches = [];

        if (preg_match_all('/\d+[GT]B/', $value, $matches)) {
            $matches = $matches[0];

            array_walk($matches, function (&$val) {
                $val = $this->toGb($val);
            });

            rsort($matches);

            $value = $this->toGb($matches[0]);

            if (count($matches) > 1) {
                $result['disk_cache'] = $matches[1];
            }
        }

        $result['disk_capacity'] = (int)$value;

        return $result;
    }

    protected function toGb($value)
    {
        if (str_contains($value, 'TB')) {
            $value = $value * 1000;
        }

        return (int)$value;
    }
}