<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\DataCollection;

class FormBooking extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.form-booking';
    protected static bool $shouldRegisterNavigation = false;


    public ?DataCollection $modelPotongan = null;

    public function mount(): void
    {
        $modelId = request()->get('model_id');

        if ($modelId) {
            $this->modelPotongan = DataCollection::find($modelId);
        }
    }
}
