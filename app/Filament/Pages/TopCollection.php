<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\DataCollection;
use Illuminate\Support\Facades\Auth;

class TopCollection extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static string $view = 'filament.pages.top-collection';
    protected static ?string $title = 'Top Collection';

    public $collections;

    public function mount()
    {
        $this->collections = DataCollection::all();
    }

    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('pengguna');
    }

    public function getData()
    {
        return DataCollection::all();
    }
}
