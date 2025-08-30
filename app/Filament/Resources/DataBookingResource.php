<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\JamAntrian;
use Filament\Tables\Table;
use App\Models\DataBooking;
use App\Models\TanggalAntrian;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\DataBookingResource\Pages;

class DataBookingResource extends Resource
{
    protected static ?string $model = DataBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Data Booking';
    protected static ?string $navigationGroup = 'Booking';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('admin');
    }

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
                    ->relationship('jamAntrian', 'slot_jam')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('tanggal_antrian_id')
                    ->label('Tanggal Antrian')
                    ->relationship('tanggalAntrian', 'slot_tanggal')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        1 => 'Menunggu',
                        2 => 'Dikonfirmasi',
                        3 => 'Selesai',
                        4 => 'Dibatalkan',
                    ]),

                Forms\Components\Select::make('data_collection_id')
                    ->label('Data Collection')
                    ->relationship('collection', 'nama_model')
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

                Tables\Columns\TextColumn::make('collection.nama_model')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),
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
