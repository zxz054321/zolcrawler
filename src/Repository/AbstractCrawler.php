<?php

namespace AbelHalo\ZolCrawler\Repository;

use AbelHalo\ZolCrawler\Repository\Exceptions\CantFetchHtmlException;
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