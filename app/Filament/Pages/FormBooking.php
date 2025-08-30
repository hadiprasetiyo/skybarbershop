<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\JamAntrian;
use App\Models\DataBooking;
use App\Models\DataCollection;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\UserBookingResource;
use Filament\Notifications\Notification;

class FormBooking extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.form-booking';
    protected static bool $shouldRegisterNavigation = false;

    public ?DataCollection $modelPotongan = null;
    public $availableSlots = [];
    public $userId;
    public $userName;

    // binding ke select option
    public $jam;

    public function mount(): void
    {
        $this->userId = Auth::id();
        $this->userName = Auth::user()->name;

        // ambil model yang dipilih dari query string
        $modelId = request()->get('model_id');
        if ($modelId) {
            $this->modelPotongan = DataCollection::find($modelId);
        }

        // ambil semua jam antrian yang belum dibooking + include relasi tanggal
        $this->availableSlots = JamAntrian::with('tanggalAntrian')
            ->whereDoesntHave('bookings')
            ->get();
    }

    public function saveBooking()
    {
        $this->validate([
            'jam' => 'required|exists:jam_antrian,id',
        ]);

        $slot = JamAntrian::with('tanggalAntrian')->findOrFail($this->jam);

        DataBooking::create([
            'user_id' => $this->userId,
            'data_collection_id' => $this->modelPotongan->id,
            'jam_antrian_id' => $slot->id,
            'status' => '1',
        ]);

        Notification::make()
            ->title('Booking berhasil dibuat!')
            ->success()
            ->send();

        return redirect()->route('filament.admin.pages.form-booking', [
            'model_id' => $this->modelPotongan->id
        ]);
        return redirect(UserBookingResource::getUrl('index'));
    }
}
