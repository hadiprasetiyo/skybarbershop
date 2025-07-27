<?php

namespace App\Filament\Resources\WaktuAntrianResource\Pages;

use App\Filament\Resources\WaktuAntrianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWaktuAntrians extends ListRecords
{
    protected static string $resource = WaktuAntrianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
