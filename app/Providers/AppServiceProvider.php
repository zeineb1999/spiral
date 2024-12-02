<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Assurez-vous que les caractères spéciaux sont correctement gérés en UTF-8
        

        // Configurez Carbon avec la langue locale de l'application
        Carbon::setLocale(config('app.locale'));

        // Configurez la locale pour les fonctions de date PHP (comme strftime)
        setlocale(LC_TIME, config('app.locale'));
        // Utilisation des styles Bootstrap
        Paginator::useBootstrap();
    }
}
