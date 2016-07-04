<?php

use AbelHalo\ZolCrawler\Repository\Exceptions\CantFetchHtmlException;
use AbelHalo\ZolCrawler\Repository\IndexCrawler;

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

    protected function makeCrawler(Closure $urlGenerator = null)
    {
        if (!$urlGenerator) {
            $urlGenerator = function ($index) {
                return "http://detail.zol.com.cn/notebook_advSearch/subcate16_1_s859_9_1__$index.html";
            };
        }

        return new IndexCrawler($urlGenerator);
    }
}