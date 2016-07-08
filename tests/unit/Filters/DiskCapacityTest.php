<?php

use AbelHalo\ZolCrawler\Filters\DiskCapacity;

class DiskCapacityTest extends TestCase
{
    public function test()
    {
        $filter = new DiskCapacity();

        $disk = $filter->apply('500GB');
        $this->assertEquals(500, $disk['disk_capacity']);

        $disk = $filter->apply('1TB');
        $this->assertEquals(1000, $disk['disk_capacity']);

        $disk = $filter->apply('8GB+500GB');
        $this->assertEquals(500, $disk['disk_capacity']);
        $this->assertEquals(8, $disk['disk_cache']);

        $disk = $filter->apply('1TB+16GB');
        $this->assertEquals(1000, $disk['disk_capacity']);
        $this->assertEquals(16, $disk['disk_cache']);
    }
}