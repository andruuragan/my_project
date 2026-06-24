<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// АВТОМАТИЗАЦІЯ SITEMAP
// Ця команда буде автоматично генерувати карту сайту щодня опівночі
Schedule::command('sitemap:generate')->daily();
