<?php

namespace Devfaysal\FilamentGuard\Filament\Resources;

use Devfaysal\FilamentGuard\Filament\Resources\RoleResource\Pages\CreateRole;
use Devfaysal\FilamentGuard\Filament\Resources\RoleResource\Pages\EditRole;
use Devfaysal\FilamentGuard\Filament\Resources\RoleResource\Pages\ListRoles;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationGroup = 'Access Management';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Role'),
                TextInput::make('guard_name')->required()->default('admin'),
                CheckboxList::make('permissions')->relationship('permissions', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#'),
                TextColumn::make('name')->label('Role'),
                TextColumn::make('guard_name')->label('Guard'),
                TagsColumn::make('permissions.name')->label('Permissions'),
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
