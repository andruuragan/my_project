<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Catalog; // Ваша модель Catalog

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // 1. Додаємо основні сторінки
        $sitemap->add(Url::create('/')->setPriority(1.0));
        $sitemap->add(Url::create('/dymohody-ta-komplektuyuchi')->setPriority(0.9));
        $sitemap->add(Url::create('/contacts')->setPriority(0.5));
        $sitemap->add(Url::create('/about')->setPriority(0.5));

        // 2. Додаємо всі 5555 товарів
        // Використовуємо chunk, щоб не перевантажити пам'ять
        Catalog::chunk(1000, function ($catalogs) use ($sitemap) {
            foreach ($catalogs as $item) {
                // Використовуємо ваш маршрут '/catalog/{catalog}'
                $sitemap->add(Url::create("/catalog/{$item->id}") 
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
            }
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully! Total products: ' . Catalog::count());
    }
}