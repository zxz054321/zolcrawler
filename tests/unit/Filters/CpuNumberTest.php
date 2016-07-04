<?php

use AbelHalo\ZolCrawler\Repository\Filters\CpuNumber;

class CpuNumberTest extends TestCase
{
    public function test()
    {
        $filter = new CpuNumber();
        $cpu    = $filter->apply('Intel 酷睿i3 5005U');

        $this->assertEquals('intel', $cpu['cpu_brand']);
        $this->assertEquals('i3', $cpu['cpu_series']);
        $this->assertEquals('5005U', $cpu['cpu_number']);
    }
}