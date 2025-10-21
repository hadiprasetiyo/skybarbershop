<x-filament-panels::page>
    @if($this->modelPotongan)
        <div class="bg-white p-6 rounded-xl shadow-lg max-w-lg mx-auto">
            <h2 class="text-xl font-bold mb-4">
                Booking: {{ $this->modelPotongan->nama_model }}
            </h2>

            {{-- Gambar Model --}}
            <img src="{{ asset('storage/'.$this->modelPotongan->gambar) }}" 
                class="w-48 h-48 object-cover rounded mb-4 mx-auto">

            {{-- Harga --}}
            <p class="text-gray-700 mb-4">
                Harga: <strong>{{ $this->modelPotongan->harga_rupiah }}</strong>
            </p>
            {{-- Nama User Login --}}
            <p class="text-gray-700 mb-4">
                Pemesan: <strong>{{ $this->userName }}</strong>
            </p>

            {{-- Form Booking --}}
            <form wire:submit.prevent="saveBooking" class="space-y-4">

                {{-- Pilih Jam (dengan tanggal) --}}
                <div>
                    <label class="block font-medium">Pilih Jadwal</label>
                    <select wire:model="jam" class="border rounded px-2 py-1 w-full">
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
                    <label class="block font-medium">Pilih Capster</label>
                    <select wire:model="capster" class="border rounded px-2 py-1 w-full">
                        <option value="">-- pilih capster --</option>
                        @foreach ($availableCapster as $capster)
                            <option value="{{ $capster->id }}">
                                {{ $capster->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Submit Button --}}
                <x-filament::button type="submit" color="primary">
                    Konfirmasi Booking
                </x-filament::button>
            </form>

            {{-- Notifikasi sukses --}}
            @if(session()->has('success'))
                <p class="text-green-600 mt-4">{{ session('success') }}</p>
            @endif
        </div>
    @else
        <p class="text-red-500">Model tidak ditemukan.</p>
    @endif
</x-filament-panels::page>
