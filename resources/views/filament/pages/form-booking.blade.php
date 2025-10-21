<x-filament-panels::page>
    @if($this->modelPotongan)
        <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-2xl shadow-2xl mx-auto max-w-sm w-full border border-gray-100">
            <!-- Header -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                    Booking Layanan
                </h2>
                <p class="text-sm text-gray-500 font-medium">
                    {{ $this->modelPotongan->nama_model }}
                </p>
            </div>

            <!-- Image dengan efek hover -->
            <div class="relative mb-6 group">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-300"></div>
                <img src="{{ asset('storage/'.$this->modelPotongan->gambar) }}" 
                     class="relative w-full h-56 object-cover rounded-2xl shadow-md transform group-hover:scale-[1.02] transition duration-300">
            </div>

            <!-- Info Cards -->
            <div class="space-y-3 mb-6">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl border border-blue-100">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Harga</span>
                        <span class="text-lg font-bold text-blue-600">{{ $this->modelPotongan->harga_rupiah }}</span>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-4 rounded-xl border border-purple-100">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">Pemesan</span>
                        <span class="text-base font-semibold text-purple-700">{{ $this->userName }}</span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="saveBooking" class="space-y-5">

                <!-- Pilih Jadwal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        📅 Pilih Jadwal
                    </label>
                    <select wire:model="jam" 
                            wire:change="loadCapster" 
                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition duration-200 outline-none text-gray-700 font-medium">
                        <option value="">Pilih waktu booking Anda</option>
                        @foreach ($availableSlots as $slot)
                            <option value="{{ $slot->id }}">
                                {{ $slot->tanggalAntrian->slot_tanggal }} - {{ $slot->slot_jam }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Capster -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        ✂️ Pilih Capster
                    </label>

                    <select 
                        wire:model="capster" 
                        class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition duration-200 outline-none text-gray-700 font-medium disabled:bg-gray-100 disabled:cursor-not-allowed"
                        @disabled(!$jam)
                    >
                        <option value="">Pilih capster favorit Anda</option>

                        @foreach ($availableCapster as $cap)
                            <option value="{{ $cap->id }}">{{ $cap->name }}</option>
                        @endforeach
                    </select>

                    <!-- Loading State -->
                    <div wire:loading wire:target="jam" class="flex items-center gap-2 mt-2 text-sm text-blue-600 font-medium">
                        <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Memuat capster yang tersedia...</span>
                    </div>

                    <!-- Error State -->
                    @if($jam && $availableCapster->isEmpty())
                        <div class="flex items-center gap-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm text-red-600 font-medium">Semua capster sudah dibooking di jam ini.</span>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <x-filament::button 
                    type="submit" 
                    color="primary" 
                    class="w-full mt-6 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-200" 
                    wire:loading.attr="disabled">
                    <span wire:loading.remove class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Konfirmasi Booking
                    </span>
                    <span wire:loading class="flex items-center justify-center gap-2">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </x-filament::button>
            </form>
        </div>
    @else
        <div class="flex flex-col items-center justify-center p-8 bg-red-50 rounded-2xl border-2 border-red-200 max-w-md mx-auto">
            <svg class="w-16 h-16 text-red-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <p class="text-red-600 font-semibold text-lg">Model tidak ditemukan</p>
            <p class="text-red-500 text-sm mt-1">Silakan kembali dan pilih layanan lain</p>
        </div>
    @endif
</x-filament-panels::page>