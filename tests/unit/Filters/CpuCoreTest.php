<?php

use AbelHalo\ZolCrawler\Repository\Filters\CpuCore;

class CpuCoreTest extends TestCase
{
    public function test()
    {
        $filter = new CpuCore();
        $cpu    = $filter->apply('双核心/四线程');

        $this->assertEquals(2, $cpu['cpu_cores']);
        $this->assertEquals(4, $cpu['cpu_threads']);
    }
}