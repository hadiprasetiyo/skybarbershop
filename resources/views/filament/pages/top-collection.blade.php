<x-filament-panels::page>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 rounded-2xl">
        @foreach($this->getData() as $item)
            <div class="w-full mx-auto bg-red-500 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative bg-green-900 h-64 flex items-center justify-center rounded-2xl">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_model }}" class="h-48 w-48 object-cover rounded mb-3">
                </div>
                <div class="p-6 text-center rounded-2xl bg-amber-400">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3 leading-tight">
                        {{ $item->nama_model }}
                    </h3>
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <span class="text-2xl font-bold text-gray-900">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </span>
                    </div>
            <x-filament::button
                tag="a"
                href="{{ route('filament.admin.pages.form-booking', ['model_id' => $item->id]) }}">
                Pilih Model
            </x-filament::button>

                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
