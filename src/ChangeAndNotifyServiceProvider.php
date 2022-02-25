<?php

namespace MohammadAlhallaq\ChangeAndNotify;

use MohammadAlhallaq\ChangeAndNotify\Providers\EventServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MohammadAlhallaq\ChangeAndNotify\Commands\ChangeAndNotifyCommand;

class ChangeAndNotifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('change-and-notify')
            ->hasViews();

        $this->app->register(EventServiceProvider::class);

    }
}
