<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Capster;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\CapsterResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CapsterResource\RelationManagers;

class CapsterResource extends Resource
{
    protected static ?string $model = Capster::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Capster')
                    ->required()
                    ->maxLength(255),

                TextInput::make('expertise')
                    ->label('Keahlian')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Capster')->sortable()->searchable(),
                TextColumn::make('expertise')->label('Keahlian')->sortable()->searchable(),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCapsters::route('/'),
            'create' => Pages\CreateCapster::route('/create'),
            'edit' => Pages\EditCapster::route('/{record}/edit'),
        ];
    }
}
