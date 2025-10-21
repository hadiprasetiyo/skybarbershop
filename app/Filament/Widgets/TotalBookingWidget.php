<?php

namespace App\Filament\Widgets;

use App\Models\DataBooking;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TotalBookingWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalDataBooking = DataBooking::count();
        $monthlyDataBooking = DataBooking::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();
            
        $pendingDataBooking = DataBooking::where('status', '1')->count();
        $confirmDataBooking = DataBooking::where('status', '2')->count();
        $selesaiDataBooking = DataBooking::where('status', '3')->count();
        $cancelDataBooking = DataBooking::where('status', '4')->count();

        return [
            Stat::make('Total Booking', $totalDataBooking)
                ->description('Total: ' . number_format($totalDataBooking, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Booking Bulan Ini', $monthlyDataBooking)
                ->description('Total: ' . number_format($monthlyDataBooking, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('Booking Pending', $pendingDataBooking)
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            //

            Stat::make('Booking Dikonfirmasi', $confirmDataBooking)
                ->description('Sudah dikonfirmasi')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),

            Stat::make('Booking Selesai', $selesaiDataBooking)
                ->description('Sudah selesai')
                ->descriptionIcon('heroicon-m-flag')
                ->color('success'),

            Stat::make('Booking Dibatalkan', $cancelDataBooking)
                ->description('Dibatalkan pelanggan')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
    
    protected function getColumns(): int
    {
        return 3;
    }
}
