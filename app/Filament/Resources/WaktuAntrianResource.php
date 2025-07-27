<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WaktuAntrianResource\Pages;
use App\Filament\Resources\WaktuAntrianResource\RelationManagers;
use App\Models\WaktuAntrian;
use App\Models\TanggalAntrian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WaktuAntrianResource extends Resource
{
    protected static ?string $model = TanggalAntrian::class;

protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Waktu Antrian';
    protected static ?string $pluralModelLabel = 'Waktu Antrian';
    protected static ?string $modelLabel = 'Waktu Antrian';

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
