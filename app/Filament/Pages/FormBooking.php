<?php

namespace App\Filament\Pages;

use App\Models\Capster;
use App\Models\JamAntrian;
use App\Models\DataBooking;
use App\Models\DataCollection;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class FormBooking extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.form-booking';
    protected static bool $shouldRegisterNavigation = false;

    public ?DataCollection $modelPotongan = null;
    public $availableSlots = [];
    public Collection $availableCapster;
    public $userId;
    public $userName;
    public $jam;
    public $capster;

    public function mount(): void
    {

        $this->userId = Auth::id();
        $this->userName = Auth::user()->name;

        $modelId = request()->get('model_id');
        if ($modelId) {
            $this->modelPotongan = DataCollection::find($modelId);
        }

        // total semua capster
        $totalCapster = Capster::count();

        // ambil semua jam
        $allSlots = JamAntrian::with(['tanggalAntrian', 'bookings'])->get();

        // hanya jam yang belum penuh (jumlah capster booked < total capster)
        $this->availableSlots = $allSlots->filter(function ($slot) use ($totalCapster) {
            return $slot->bookings->unique('capster_id')->count() < $totalCapster;
        })->values();

        $this->availableCapster = collect();
    }

    public function updatedJam($value)
    {
        if (!$value) {
        $this->availableCapster = collect();
        return;
    }

            // ambil capster yang belum dibooking di jam itu
        $this->availableCapster = Capster::whereDoesntHave('bookings', function ($q) use ($value) {
            $q->where('jam_antrian_id', $value);
        })->get();
    }

    public function saveBooking()
    {
        $this->validate([
            'jam' => 'required|exists:jam_antrian,id',
            'capster' => 'required|exists:capsters,id',
        ]);

        $slot = JamAntrian::with('tanggalAntrian')->findOrFail($this->jam);
        $capster = Capster::findOrFail($this->capster);

        // cek capster sudah dibooking?
        $isBooked = DataBooking::where('capster_id', $capster->id)
            ->where('jam_antrian_id', $slot->id)
            ->exists();

        if ($isBooked) {
            Notification::make()
                ->title('Capster sudah dibooking di jam tersebut.')
                ->danger()
                ->send();
            return;
        }

        // simpan booking
        DataBooking::create([
            'user_id' => $this->userId,
            'data_collection_id' => $this->modelPotongan->id,
            'jam_antrian_id' => $slot->id,
            'capster_id' => $capster->id,
            'status' => 1,
        ]);

        // refresh ulang daftar slot
        $this->mount();

        Notification::make()
            ->title('Booking berhasil dibuat!')
            ->success()
            ->send();
    }
}
