<x-filament-panels::page>
    @if($this->modelPotongan)
        <div class="bg-white p-6 rounded-xl shadow-lg max-w-lg mx-auto">
            <h2 class="text-xl font-bold mb-4">
                Booking: {{ $this->modelPotongan->nama_model }}
            </h2>
            <img src="{{ asset('storage/'.$this->modelPotongan->gambar) }}" 
                class="w-48 h-48 object-cover rounded mb-4 mx-auto">

            <form wire:submit.prevent="saveBooking">
                <div class="mb-4">
                    <label class="block font-medium mb-2">Pilih Tanggal</label>
                    <input type="date" wire:model="tanggal" class="border rounded p-2 w-full">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-2">Pilih Jam</label>
                    <input type="time" wire:model="jam" class="border rounded p-2 w-full">
                </div>

                <x-filament::button type="submit" color="primary">
                    Konfirmasi Booking
                </x-filament::button>
            </form>
        </div>
    @else
        <p class="text-red-500">Model tidak ditemukan.</p>
    @endif
</x-filament-panels::page>
