<?php

namespace Modules\Greentest\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Greentest\Events\Handlers\RegisterGreentestSidebar;

class GreentestServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterGreentestSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('businesses', array_dot(trans('greentest::businesses')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('greentest', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Greentest\Repositories\businessRepository',
            function () {
                $repository = new \Modules\Greentest\Repositories\Eloquent\EloquentbusinessRepository(new \Modules\Greentest\Entities\business());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Greentest\Repositories\Cache\CachebusinessDecorator($repository);
            }
        );
// add bindings

    }
}
