<?php

use AbelHalo\ZolCrawler\Repository\Exceptions\CantFetchHtmlException;
use AbelHalo\ZolCrawler\Repository\LaptopCrawler;

class LaptopCrawlerTest extends TestCase
{
    public function testParseParam()
    {
        $crawler = new LaptopCrawler();

        $this->assertEquals('cpu_number',
            $crawler->parseParam('CPU型号')
        );

        $this->assertEquals('screen_resolution',
            $crawler->parseParam('屏幕分辨率')
        );

        $this->assertFalse(
            $crawler->parseParam('a5sd4f')
        );
    }

    public function testCrawl()
    {
        try {
            $dataset = app('zolcrawler.laptop.index')->crawl();
            $crawler = app('zolcrawler.laptop.param');
            $url     = $dataset[0]['param_url'];

            $this->assertNotEmpty($crawler->crawl($url));
        } catch (CantFetchHtmlException $e) {
            echo 'NetworkError';
        }
    }
}