<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\WaktuAntrian;
use App\Models\TanggalAntrian;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\HasManyRepeater;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WaktuAntrianResource\Pages;
use App\Filament\Resources\WaktuAntrianResource\RelationManagers;

class WaktuAntrianResource extends Resource
{
    protected static ?string $model = TanggalAntrian::class;

protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Waktu Antrian';
    protected static ?string $pluralModelLabel = 'Waktu Antrian';
    protected static ?string $modelLabel = 'Waktu Antrian';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('admin');
    }

    public static function form(Form $form): Form
    {
      return $form
        ->schema([
            DatePicker::make('slot_tanggal')
                ->label('Tanggal Antrian')
                ->required(),

            HasManyRepeater::make('jamAntrian')
                ->label('Daftar Jam Antrian')
                ->relationship('jamAntrian') // dari relasi hasMany
                ->schema([
                    TextInput::make('slot_jam')
                        ->label('Jam Antrian (format: HH:MM)')
                        ->required()
                        ->placeholder('Contoh: 10:00'),
                ])
                ->defaultItems(1)
                ->reorderable()
                ->collapsible()
                ->createItemButtonLabel('Tambah Jam Antrian'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('slot_tanggal')
                  ->label('Tanggal Antrian')
                  ->date(),

              TextColumn::make('jamAntrian.slot_jam')
                  ->label('Jam Tersedia')
                  ->badge()
                  ->separator(', ')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListWaktuAntrians::route('/'),
            'create' => Pages\CreateWaktuAntrian::route('/create'),
            'edit' => Pages\EditWaktuAntrian::route('/{record}/edit'),
        ];
    }
}
