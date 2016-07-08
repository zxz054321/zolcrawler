<?php

namespace AbelHalo\ZolCrawler;

use AbelHalo\ZolCrawler\Contracts\UrlGenerator;
use AbelHalo\ZolCrawler\Exceptions\CantFetchHtmlException;
use Symfony\Component\DomCrawler\Crawler;

class IndexCrawler extends AbstractCrawler
{
    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator = null)
    {
        is_null($urlGenerator) or
        $this->setUrlGenerator($urlGenerator);
    }

    public function setUrlGenerator(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;

        return $this;
    }

    /**
     * @param int $index
     * @return array|false
     * @throws CantFetchHtmlException
     */
    public function crawl($index = 1)
    {
        $url     = $this->pageUrl($index);
        $html    = $this->fetchHtml($url);
        $crawler = new Crawler($html, $url);
        $list    = $crawler->filter('.result_list');

        if (!count($list)) {
            return false;
        }

        $dataset = $list->children()->each(function (Crawler $node) {
            // Product name
            $item ['name'] = $node->filter('.pro_detail dt a')->text();

            // Product price
            $priceText      = $node->filter('.price-type')->text();
            $item ['price'] = $this->applyFilter('price', $priceText);

            // Product status
            if (-1 === $item ['price']) {
                $item ['status'] = $this->applyFilter('status', $priceText);
            } else {
                $statusNode      = $node->filter('.price-status');
                $item ['status'] = $this->applyFilter('status',
                    count($statusNode) ? $statusNode->text() : ''
                );
            }

            // Update date
            $dateNode             = $node->filter('.date');
            $item ['online_date'] = count($dateNode) ?
                $this->applyFilter('date', $dateNode->text()) :
                null;

            // Param url
            $item['param_url'] = $node->selectLink('更多参数>>')->link()->getUri();

            return $item;
        });

        return $dataset;
    }

    public function pageUrl($index)
    {
        return $this->urlGenerator->generate($index);
    }
}