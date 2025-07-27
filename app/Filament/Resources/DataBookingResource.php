<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataBookingResource\Pages;
use App\Models\DataBooking;
use App\Models\User;
use App\Models\JamAntrian;
use App\Models\TanggalAntrian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataBookingResource extends Resource
{
    protected static ?string $model = DataBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Data Booking';
    protected static ?string $navigationGroup = 'Booking';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Pelanggan')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('jam_antrian_id')
                    ->label('Jam Antrian')
                    ->relationship('jamAntrian', 'jam')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('tanggal_antrian_id')
                    ->label('Tanggal Antrian')
                    ->relationship('tanggalAntrian', 'tanggal')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        1 => 'Menunggu',
                        2 => 'Dikonfirmasi',
                        3 => 'Selesai',
                        4 => 'Dibatalkan',
                    ])
                    ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jamAntrian.jam')
                    ->label('Jam'),

                Tables\Columns\TextColumn::make('tanggalAntrian.tanggal')
                    ->label('Tanggal'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        return match ((int) $state) {
                            1 => 'Menunggu',
                            2 => 'Dikonfirmasi',
                            3 => 'Selesai',
                            4 => 'Dibatalkan',
                            default => 'Tidak Diketahui',
                        };
                    })
                    ->color(function ($state) {
                        return match ((int) $state) {
                            1 => 'gray',
                            2 => 'info',
                            3 => 'success',
                            4 => 'danger',
                            default => 'secondary',
                        };
    }),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataBookings::route('/'),
            'create' => Pages\CreateDataBooking::route('/create'),
            'edit' => Pages\EditDataBooking::route('/{record}/edit'),
        ];
    }
}
