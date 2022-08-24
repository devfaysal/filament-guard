<?php

namespace Devfaysal\FilamentGuard\Filament\Resources;

use Devfaysal\FilamentGuard\Filament\Resources\PermissionResource\Pages\CreatePermission;
use Devfaysal\FilamentGuard\Filament\Resources\PermissionResource\Pages\EditPermission;
use Devfaysal\FilamentGuard\Filament\Resources\PermissionResource\Pages\ListPermissions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Spatie\Permission\Models\Permission;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationGroup = 'Access Management';

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Permission'),
                TextInput::make('guard_name')->required()->default('web'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#'),
                TextColumn::make('name')->label('Permission'),
                TextColumn::make('guard_name')->label('Guard'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermissions::route('/'),
            'create' => CreatePermission::route('/create'),
            'edit' => EditPermission::route('/{record}/edit'),
        ];
    }
}
