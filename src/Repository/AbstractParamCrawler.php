<?php

namespace AbelHalo\ZolCrawler\Repository;

use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractParamCrawler extends AbstractCrawler
{
    protected $dict = [];

    /**
     * @param $url
     * @return array
     * @throws Exceptions\CantFetchHtmlException
     */
    public function crawl($url)
    {
        $html    = $this->fetchHtml($url);
        $crawler = new Crawler($html, $url);

        $data = $crawler
            ->filter('.category-param-list')
            ->each(function (Crawler $node) {
                $params = [];

                $node->children()->each(function (Crawler $node)
                use (&$params) {
                    $name  = $node->filter('.param-name')->text();
                    $value = $node->filter('span')->eq(1)->text();

                    if ($key = $this->parseParam($name)) {
                        if (isset($this->filters[ $key ])) {
                            /** @var Filter $filter */
                            $filter = $this->filters[ $key ];
                            $value  = $filter->apply($value);

                            if (is_array($value)) {
                                $params = array_merge($params, $value);

                                return;
                            }
                        }

                        $params[ $key ] = $value;
                    }
                });

                return $params;
            });

        return array_collapse($data);
    }

    public function parseParam($name)
    {
        $key = false;

        if (isset($this->dict[ $name ])) {
            $key = $this->dict[ $name ];
        }

        return $key;
    }
}