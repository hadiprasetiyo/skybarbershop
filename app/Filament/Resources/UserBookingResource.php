<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataBooking;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserBookingResource\Pages;
use App\Filament\Resources\UserBookingResource\RelationManagers;
use App\Filament\Resources\DataBookingResource\Pages\EditDataBooking;
use App\Filament\Resources\DataBookingResource\Pages\ListDataBookings;
use App\Filament\Resources\DataBookingResource\Pages\CreateDataBooking;

class UserBookingResource extends Resource
{
    protected static ?string $model = DataBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Riwayat Booking';
    protected static ?string $navigationGroup = 'Booking';
    
    public static function getEloquentQuery(): Builder
    {
        // Ambil query bawaan resource
        $query = parent::getEloquentQuery();

        // Filter hanya untuk user yang sedang login
        return $query->where('user_id', Auth::id());
    }

    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('pengguna');
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

                Select::make('tanggal_antrian_id')
                    ->label('Tanggal Antrian')
                    ->relationship('tanggalAntrian', 'slot_tanggal')
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

                // akses ke tanggal lewat jamAntrian
                TextColumn::make('jamAntrian.tanggalAntrian.slot_tanggal')
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
                    ->label('Model Potongan')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserBookings::route('/'),
        ];
    }
}
