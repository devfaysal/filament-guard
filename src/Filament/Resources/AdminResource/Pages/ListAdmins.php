<?php

namespace Devfaysal\FilamentGuard\Filament\Resources\AdminResource\Pages;

use Devfaysal\FilamentGuard\Filament\Resources\AdminResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
