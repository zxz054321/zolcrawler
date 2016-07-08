<?php

namespace AbelHalo\ZolCrawler;

use AbelHalo\ZolCrawler\Contracts\Filter;
use AbelHalo\ZolCrawler\Exceptions\CantFetchHtmlException;
use Curl\Curl;

abstract class AbstractCrawler
{
    protected $filters = [];

    public function setFilter($name, $filter)
    {
        $this->filters[ $name ] = $filter;
    }

    public function applyFilter($name, $value)
    {
        if (isset($this->filters[ $name ])) {
            /** @var Filter $filter */
            $filter = $this->filters[ $name ];

            return $filter->apply($value);
        }

        return $value;
    }

    /**
     * @param $url
     * @return string|bool
     * @throws CantFetchHtmlException
     */
    public function fetchHtml($url)
    {
        $curl = new Curl();

        $curl->get($url);

        if (!$curl->response) {
            throw new CantFetchHtmlException;
        }

        return $curl->response;
    }
}