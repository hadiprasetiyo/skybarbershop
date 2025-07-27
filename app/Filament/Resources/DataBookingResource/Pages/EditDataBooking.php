<?php

namespace App\Filament\Resources\DataBookingResource\Pages;

use App\Filament\Resources\DataBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataBooking extends EditRecord
{
    protected static string $resource = DataBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
