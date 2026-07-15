<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Catalog;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected string $domain = 'https://www.dymsystems.pp.ua';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $pages = [
            ['/', 1.0],

            ['/dymohody-ta-komplektuyuchi', 0.9],
            ['/categories', 0.9],

            ['/systema-odnostinnih-dimohodiv', 0.9],
            ['/termo-sendvich-dimohidna-systema', 0.9],
            ['/systema-kriplen-homutiv-ta-komplektuyuchih', 0.9],

            ['/chimney-calculator', 0.8],
            ['/how-to-choose-chimney-diameter', 0.8],
            ['/montazh-dymohodu-pravyla', 0.8],
            ['/useful-info', 0.8],

            ['/blog/pomylky-montazhu', 0.7],

            ['/about', 0.5],
            ['/contacts', 0.5],
        ];

        foreach ($pages as [$url, $priority]) {
            $sitemap->add(
                Url::create($this->domain . $url)
                    ->setPriority($priority)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        }

        // Товари
        Catalog::chunk(1000, function ($catalogs) use ($sitemap) {
            foreach ($catalogs as $item) {
                $sitemap->add(
                    Url::create($this->domain . "/catalog/{$item->id}")
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                );
            }
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully! Total products: ' . Catalog::count());
    }
}