<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class DashboardUser extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-user';

    public static function canAccess(): bool
  {
    return Auth::user() ?->roles->contains('user');
  }
}
