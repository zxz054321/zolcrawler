<?php

use AbelHalo\ZolCrawler\Repository\Filters\CpuFreq;

class CpuFreqTest extends TestCase
{
    public function test()
    {
        $filter = new CpuFreq();

        $this->assertEquals(2100, $filter->apply('2.1GHz'));
        $this->assertEquals(3000, $filter->apply('3GHz'));
        $this->assertEquals(3600, $filter->apply('3600MHz'));
    }
}