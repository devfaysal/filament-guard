<?php

namespace Devfaysal\FilamentGuard;

use Devfaysal\FilamentGuard\Filament\Resources\PermissionResource;
use Devfaysal\FilamentGuard\Filament\Resources\RoleResource;
use Filament\Events\ServingFilament;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Event;
use Spatie\LaravelPackageTools\Package;

class FilamentGuardServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        PermissionResource::class,
        RoleResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-guard')
            ->hasConfigFile('filament-guard')
            ->hasMigration('create_admins_table');
    }

    public function packageBooted():void
    {
        parent::packageBooted();
        $this->registerGuard();
    }

    public function registerGuard()
    {
        $this->app->booted(function () {
            $this->app['config']->set('auth.guards.admin', [
                'driver' => 'session',
                'provider' => 'admins',
            ]);

            $this->app['config']->set('auth.passwords.admins', [
                'provider' => 'admins',
                'table' => 'password_resets',
                'expire' => 60,
                'throttle' => 60,
            ]);

            $this->app['config']->set('auth.providers.admins', [
                'driver' => 'eloquent',
                'model' => config('filament-guard.model'),
            ]);
        });
    }
}
