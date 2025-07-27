<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\DataCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TopCollection extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.top-collection';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('pengguna');
    }

    public function getData(): Collection
    {
        return DataCollection::all();
    }
}
