<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Catalog;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $domain = 'https://www.dymsystems.pp.ua'; // Ваш домен тут

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Додаємо основні сторінки з повним URL
        $sitemap->add(Url::create($this->domain . '/')->setPriority(1.0));
        $sitemap->add(Url::create($this->domain . '/dymohody-ta-komplektuyuchi')->setPriority(0.9));
        $sitemap->add(Url::create($this->domain . '/contacts')->setPriority(0.5));
        $sitemap->add(Url::create($this->domain . '/about')->setPriority(0.5));

        // Додаємо всі товари
        Catalog::chunk(1000, function ($catalogs) use ($sitemap) {
            foreach ($catalogs as $item) {
                $sitemap->add(Url::create($this->domain . "/catalog/{$item->id}") 
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
            }
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully! Total products: ' . Catalog::count());
    }
}