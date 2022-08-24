<?php

namespace Devfaysal\FilamentGuard\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devfaysal\FilamentGuard\FilamentGuard
 */
class FilamentGuard extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-guard';
    }
}
