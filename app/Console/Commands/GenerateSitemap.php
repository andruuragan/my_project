<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Catalog;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap.xml';

    protected string $domain = 'https://www.dymsystems.pp.ua';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Дата генерації sitemap
        $generatedAt = now();

        $pages = [

            // Головна
            ['/', 1.0, Url::CHANGE_FREQUENCY_DAILY],

            // Основні сторінки
            ['/dymohody-ta-komplektuyuchi', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],
            ['/categories', 0.9, Url::CHANGE_FREQUENCY_WEEKLY],

            // Категорії
            ['/systema-odnostinnih-dimohodiv', 0.9, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/termo-sendvich-dimohidna-systema', 0.9, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/systema-kriplen-homutiv-ta-komplektuyuchih', 0.9, Url::CHANGE_FREQUENCY_MONTHLY],

            // Сервіси
            ['/chimney-calculator', 0.8, Url::CHANGE_FREQUENCY_WEEKLY],

            // Інформаційні сторінки
            ['/how-to-choose-chimney-diameter', 0.8, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/montazh-dymohodu-pravyla', 0.8, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/useful-info', 0.8, Url::CHANGE_FREQUENCY_WEEKLY],

            // Статті
            ['/bazaltova-vata-dlya-dimohodiv', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/sazha-v-dimohodi', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/blog/pomylky-montazhu', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],
            ['/blog/marky-stali-dlya-dymohodiv', 0.7, Url::CHANGE_FREQUENCY_MONTHLY],

            // Інформація
            ['/about', 0.5, Url::CHANGE_FREQUENCY_YEARLY],
            ['/contacts', 0.5, Url::CHANGE_FREQUENCY_YEARLY],
        ];

        foreach ($pages as [$url, $priority, $frequency]) {

            $sitemap->add(
                Url::create($this->domain . $url)
                    ->setPriority($priority)
                    ->setChangeFrequency($frequency)
                    ->setLastModificationDate($generatedAt)
            );
        }

        // Товари
        Catalog::chunk(1000, function ($catalogs) use ($sitemap, $generatedAt) {

            foreach ($catalogs as $item) {

                $sitemap->add(
                    Url::create($this->domain . "/catalog/{$item->id}")
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setLastModificationDate($generatedAt)
                );

            }

        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info(
            'Sitemap generated successfully! Total products: ' . Catalog::count()
        );
    }
}