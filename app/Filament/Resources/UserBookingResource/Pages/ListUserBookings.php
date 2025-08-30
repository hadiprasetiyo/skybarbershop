<?php

namespace App\Filament\Resources\UserBookingResource\Pages;

use App\Filament\Resources\UserBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserBookings extends ListRecords
{
    protected static string $resource = UserBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
