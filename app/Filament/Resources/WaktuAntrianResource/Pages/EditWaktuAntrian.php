<?php

namespace App\Filament\Resources\WaktuAntrianResource\Pages;

use App\Filament\Resources\WaktuAntrianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWaktuAntrian extends EditRecord
{
    protected static string $resource = WaktuAntrianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
