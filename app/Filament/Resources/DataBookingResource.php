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
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\DataBookingResource\Pages;
use App\Filament\Resources\DataBookingResource\Pages\EditDataBooking;
use App\Filament\Resources\DataBookingResource\Pages\ListDataBookings;
use App\Filament\Resources\DataBookingResource\Pages\CreateDataBooking;

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
                Select::make('user_id')
                    ->label('Pelanggan')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('jam_antrian_id')
                    ->label('Jam Antrian')
                    ->relationship('jamAntrian', 'slot_jam')
                    ->searchable()
                    ->required(),

                Select::make('jamAntrian.tanggalAntrian.slot_tanggal')
                    ->label('Tanggal Antrian')
                    ->searchable()
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        1 => 'Menunggu',
                        2 => 'Dikonfirmasi',
                        3 => 'Selesai',
                        4 => 'Dibatalkan',
                    ]),

                Select::make('data_collection_id')
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
                TextColumn::make('user.name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jamAntrian.slot_jam')
                    ->label('Jam'),

                TextColumn::make('tanggalAntrian.slot_tanggal')
                    ->label('Tanggal'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        1 => 'Menunggu',
                        2 => 'Dikonfirmasi',
                        3 => 'Selesai',
                        4 => 'Dibatalkan',
                        default => 'Tidak Diketahui',
                    })
                    ->color(fn ($state) => match ((int) $state) {
                        1 => 'gray',
                        2 => 'info',
                        3 => 'success',
                        4 => 'danger',
                        default => 'secondary',
                    }),

                TextColumn::make('collection.nama_model')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),
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
            'index' => ListDataBookings::route('/'),
            'create' => CreateDataBooking::route('/create'),
            'edit' => EditDataBooking::route('/{record}/edit'),
        ];
    }
}
