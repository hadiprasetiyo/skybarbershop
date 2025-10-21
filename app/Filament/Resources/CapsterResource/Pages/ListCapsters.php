<?php

namespace App\Filament\Resources\CapsterResource\Pages;

use App\Filament\Resources\CapsterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCapsters extends ListRecords
{
    protected static string $resource = CapsterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
