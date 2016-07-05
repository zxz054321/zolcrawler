<?php

use AbelHalo\ZolCrawler\Repository\Filters\RamType;

class RamTypeTest extends TestCase
{
    public function test()
    {
        $filter = new RamType();

        $disk = $filter->apply('DDR3L（低电压版）1600MHz');
        $this->assertEquals('DDR3L', $disk['ram_type']);
        $this->assertEquals(1600, $disk['ram_freq']);

        $disk = $filter->apply('DDR4 2133MHz');
        $this->assertEquals('DDR4', $disk['ram_type']);
        $this->assertEquals(2133, $disk['ram_freq']);
    }
}