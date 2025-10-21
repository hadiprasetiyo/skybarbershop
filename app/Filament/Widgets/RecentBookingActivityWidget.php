<?php

namespace App\Filament\Widgets;

use App\Models\DataBooking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentBookingActivityWidget extends BaseWidget
{
    protected static ?string $heading = 'Aktivitas Booking Terbaru';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                DataBooking::query()
                    ->with(['user', 'capster', 'jamAntrian.tanggalAntrian', 'collection'])
                    ->latest()
                    ->limit(20)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jamAntrian.tanggalAntrian.slot_tanggal')
                    ->label('Tanggal')
                    ->sortable()
                    ->dateTime('d/m/Y'),

                Tables\Columns\TextColumn::make('jamAntrian.slot_jam')
                    ->label('Jam')
                    ->sortable(),

                Tables\Columns\TextColumn::make('capster.name')
                    ->label('Capster')
                    ->sortable(),

                Tables\Columns\TextColumn::make('collection.nama_model')
                    ->label('Services')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
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
                        1 => 'warning',
                        2 => 'info',
                        3 => 'success',
                        4 => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25])
            ->poll('30s');
    }
}
