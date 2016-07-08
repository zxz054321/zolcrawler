<?php

namespace AbelHalo\ZolCrawler;

use AbelHalo\ZolCrawler\Filters\CpuCore;
use AbelHalo\ZolCrawler\Filters\CpuFreq;
use AbelHalo\ZolCrawler\Filters\CpuNumber;
use AbelHalo\ZolCrawler\Filters\Date;
use AbelHalo\ZolCrawler\Filters\DiskCapacity;
use AbelHalo\ZolCrawler\Filters\DiskDescription;
use AbelHalo\ZolCrawler\Filters\Price;
use AbelHalo\ZolCrawler\Filters\RamCapacity;
use AbelHalo\ZolCrawler\Filters\RamType;
use AbelHalo\ZolCrawler\Filters\Status;
use AbelHalo\ZolCrawler\Filters\ToFloat;
use AbelHalo\ZolCrawler\Filters\ToInt;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('zolcrawler.laptop.index', function () {
            $crawler = new IndexCrawler();

            $crawler->setFilter('price', new Price());
            $crawler->setFilter('status', new Status());
            $crawler->setFilter('date', new Date());

            return $crawler;
        });

        $this->app->bind('zolcrawler.laptop.param', function () {
            $crawler = new LaptopCrawler;
            $toInt   = new ToInt();
            $toFloat = new ToFloat();

            $crawler->setFilter('cpu_number', new CpuNumber());
            $crawler->setFilter('cpu_freq', new CpuFreq());
            $crawler->setFilter('cpu_freq_turbo', new CpuFreq());
            $crawler->setFilter('cpu_l2', $toInt);
            $crawler->setFilter('cpu_l3', $toInt);
            $crawler->setFilter('cpu_cores', new CpuCore());
            $crawler->setFilter('cpu_lithography', $toInt);
            $crawler->setFilter('cpu_tdp', $toInt);

            $crawler->setFilter('ram_capacity', new RamCapacity());
            $crawler->setFilter('ram_type', new RamType());
            $crawler->setFilter('ram_capacity_max', $toInt);

            $crawler->setFilter('disk_capacity', new DiskCapacity());
            $crawler->setFilter('disk_description', new DiskDescription());

            $crawler->setFilter('screen_size', $toFloat);

            $crawler->setFilter('weight', $toFloat);
            $crawler->setFilter('thickness', $toFloat);

            return $crawler;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'zolcrawler.laptop.index',
            'zolcrawler.laptop.param',
        ];
    }
}
