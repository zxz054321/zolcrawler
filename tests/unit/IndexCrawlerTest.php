<?php

use AbelHalo\ZolCrawler\Exceptions\CantFetchHtmlException;
use AbelHalo\ZolCrawler\UrlGenerator\Laptop;

class IndexCrawlerTest extends TestCase
{
    public function testUrlGenerator()
    {
        $crawler = $this->makeCrawler();

        $this->assertEquals(
            'http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s859_9_1__1.html',
            $crawler->pageUrl(1)
        );

        $this->assertEquals(
            'http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s859_9_1__999.html',
            $crawler->pageUrl(999)
        );
    }

    public function testCrawl()
    {
        $crawler = $this->makeCrawler();
        // $crawler =app('zolcrawler.laptop.index');
        // dd($crawler->crawl(160));

        try {
            $this->assertEquals(30, count($crawler->crawl()));
            $this->assertFalse($crawler->crawl(999));
        } catch (CantFetchHtmlException $e) {
            echo 'NetworkError';
        }
    }

    /**
     * @return \AbelHalo\ZolCrawler\IndexCrawler
     */
    protected function makeCrawler()
    {
        return app('zolcrawler.laptop.index')->setUrlGenerator(new Laptop());
    }
}