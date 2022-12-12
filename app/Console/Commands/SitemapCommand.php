<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;

class SitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap for InsulationStoreOnline';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create('https://insulationstoreonline.co.uk/browse/all/')->writeToFile(public_path('browse_sitemap.xml'));
        SitemapGenerator::create('https://insulationstoreonline.co.uk/product/')->writeToFile(public_path('product_sitemap.xml'));
        SitemapGenerator::create('https://insulationstoreonline.co.uk/')->writeToFile(public_path('index_sitemap.xml'));

        SitemapIndex::create()
            ->add('browse_sitemap.xml')
            ->add('product_sitemap.xml')
            ->add('index_sitemap.xml')
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated!');

    }
}
