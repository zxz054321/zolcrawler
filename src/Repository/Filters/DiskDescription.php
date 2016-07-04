<?php

namespace AbelHalo\ZolCrawler\Repository\Filters;

use AbelHalo\ZolCrawler\Repository\Filter;

class DiskDescription implements Filter
{
    public function apply($value)
    {
        $matches = [];
        $result  = [];

        if (str_contains($value, '混合硬盘')) {
            $result['disk_type'] = 'sshd';
        } elseif (str_contains($value, '固态硬盘')) {
            $result['disk_type'] = 'ssd';
        } else {
            $result['disk_type'] = 'hdd';
        }

        if (preg_match('/(\d+)转/', $value, $matches)) {
            $result['disk_rpm'] = (int)$matches[1];
        } else {
            $result['disk_rpm'] = 0;
        }

        return $result;
    }
}