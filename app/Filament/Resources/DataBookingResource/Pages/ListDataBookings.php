<?php

namespace App\Filament\Resources\DataBookingResource\Pages;

use App\Filament\Resources\DataBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataBookings extends ListRecords
{
    protected static string $resource = DataBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
