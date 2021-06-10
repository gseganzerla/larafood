<?php

namespace App\Providers;

use App\Models\{
    Plan,
    Tenant,
    Product,
    Category,
    Client,
    Table
};
use App\Observers\{
    PlanObserver,
    TenantObserver,
    ProductObserver,
    CategoryObserver,
    ClientObserver,
    TableObserver
};

use Illuminate\Support\ServiceProvider;
use Faker\Generator;
use Faker\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create('pt_BR');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Client::observe(ClientObserver::class);
        Table::observe(TableObserver::class);
    }
}
