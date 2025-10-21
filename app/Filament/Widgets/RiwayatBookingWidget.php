<?php

namespace App\Filament\Widgets;

use App\Models\DataBooking;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class RiwayatBookingWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalDataBooking = DataBooking::where('user_id', Auth::user()->id)->count();

        $pendingDataBooking = DataBooking::where('user_id', Auth::user()->id)->where('status', '1')->count();
        $selesaiDataBooking = DataBooking::where('user_id', Auth::user()->id)->where('status', '3')->count();

        return [
            Stat::make('Total Booking', $totalDataBooking)
                ->description('Total: ' . number_format($totalDataBooking, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

                
            Stat::make('Booking Pending', $pendingDataBooking)
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            
            Stat::make('Booking Selesai', $selesaiDataBooking)
                ->description('Selesai')
                ->descriptionIcon('heroicon-m-flag')
                ->color('success'),
        ];
    }
    
    protected function getColumns(): int
    {
        return 3;
    }
}
