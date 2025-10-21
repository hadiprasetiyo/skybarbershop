<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('admin');
    }
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\TopCollectionChartWidget::class,
            \App\Filament\Widgets\TotalBookingWidget::class,
        ];
    }
}
