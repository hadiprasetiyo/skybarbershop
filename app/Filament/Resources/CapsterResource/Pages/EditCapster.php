<?php

namespace App\Filament\Resources\CapsterResource\Pages;

use App\Filament\Resources\CapsterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCapster extends EditRecord
{
    protected static string $resource = CapsterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
