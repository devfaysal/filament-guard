<?php

namespace Devfaysal\FilamentGuard\Filament\Resources\AdminResource\Pages;

use Devfaysal\FilamentGuard\Filament\Resources\AdminResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
