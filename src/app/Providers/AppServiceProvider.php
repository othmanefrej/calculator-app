<?php

namespace App\Providers;

use App\Services\Calculator\Addition;
use App\Services\Calculator\Division;
use App\Services\Calculator\Multiplication;
use App\Services\Calculator\OperationInterface;
use App\Services\Calculator\Subtraction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OperationInterface::class, Addition::class);
        $this->app->bind(OperationInterface::class, Division::class);
        $this->app->bind(OperationInterface::class, Subtraction::class);
        $this->app->bind(OperationInterface::class, Multiplication::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
