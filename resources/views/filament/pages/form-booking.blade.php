<x-filament-panels::page>
    @if($this->modelPotongan)
        <div class="bg-white p-6 rounded-xl shadow-lg mx-auto min-w-[300px] max-w-[400px] w-full">
            <h2 class="text-xl font-bold mb-4">
                Booking: {{ $this->modelPotongan->nama_model }}
            </h2>

            <img src="{{ asset('storage/'.$this->modelPotongan->gambar) }}" 
                 class="w-48 h-48 object-cover rounded mb-4 mx-auto">

            <p class="text-gray-700 mb-4">
                Harga: <strong>{{ $this->modelPotongan->harga_rupiah }}</strong>
            </p>

            <p class="text-gray-700 mb-4">
                Pemesan: <strong>{{ $this->userName }}</strong>
            </p>

            <form wire:submit.prevent="saveBooking" class="space-y-4">

                {{-- Pilih Jam --}}
                <div>
                    <label class="block font-medium mb-1">Pilih Jadwal</label>
                    <select wire:model="jam" wire:change="loadCapster" class="border rounded px-2 py-1 w-full">
                        <option value="">-- pilih jadwal --</option>
                        @foreach ($availableSlots as $slot)
                            <option value="{{ $slot->id }}">
                                {{ $slot->tanggalAntrian->slot_tanggal }} - {{ $slot->slot_jam }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Pilih Capster --}}
                <div>
                    <label class="block font-medium mb-1">Pilih Capster</label>

                    <select 
                        wire:model="capster" 
                        class="border rounded px-2 py-1 w-full"
                        @disabled(!$jam)
                    >
                        <option value="">-- pilih capster --</option>

                        @foreach ($availableCapster as $cap)
                            <option value="{{ $cap->id }}">{{ $cap->name }}</option>
                        @endforeach
                    </select>

                    <div wire:loading wire:target="jam" class="text-sm text-blue-500 mt-1">
                        Memuat capster yang tersedia...
                    </div>

                    @if($jam && $availableCapster->isEmpty())
                        <p class="text-sm text-red-500 mt-1">Semua capster sudah dibooking di jam ini.</p>
                    @endif
                </div>

                <x-filament::button type="submit" color="primary" class="w-full" wire:loading.attr="disabled">
                    <span wire:loading.remove>Konfirmasi Booking</span>
                    <span wire:loading>Memproses...</span>
                </x-filament::button>
            </form>
        </div>
    @else
        <p class="text-red-500 text-center">Model tidak ditemukan.</p>
    @endif
</x-filament-panels::page>
