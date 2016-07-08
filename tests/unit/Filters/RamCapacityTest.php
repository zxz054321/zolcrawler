<?php

use AbelHalo\ZolCrawler\Filters\RamCapacity;

class RamCapacityTest extends TestCase
{
    public function test()
    {
        $filter = new RamCapacity();

        $disk = $filter->apply('4GB（4GB×1）');
        $this->assertEquals(4, $disk['ram_capacity']);
        $this->assertEquals('4GB×1', $disk['ram_description']);
    }
}