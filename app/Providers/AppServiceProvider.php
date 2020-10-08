<?php

namespace App\Providers;

use App\View\Components\InfoBox;
use App\View\Components\MatchesTable;
use App\View\Components\StatsTable;
use App\View\Components\TeamsList;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Remove constraint problems
         */
        Builder::defaultStringLength(191);

        /**
         * Register component class
         */
        Blade::component('package-team-list', TeamsList::class);
        Blade::component('package-stats-table', StatsTable::class);
        Blade::component('package-matches-table', MatchesTable::class);
        Blade::component('package-info-box', InfoBox::class);
    }
}
