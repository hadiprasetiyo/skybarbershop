<x-filament-panels::page>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 rounded-2xl">
        @foreach($this->getData() as $item)
            <div class="w-full mx-auto bg-red-500 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative bg-green-900 h-32 flex items-center justify-center rounded-xl"> <!-- CHANGED: h-32 → h-36 -->
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_model }}" class="h-32 w-32 object-cover rounded"> <!-- CHANGED: h-20 w-20 → h-24 w-24 -->
                </div>
                <div class="p-3 text-center rounded-xl bg-amber-400">
                    <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">
                        {{ $item->nama_model }}
                    </h3>
                    <div class="mb-2">
                        <span class="text-lg font-bold text-gray-900">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </span>
                    </div>
                    <x-filament::button
                        size="sm"
                        tag="a"
                        href="{{ route('filament.admin.pages.form-booking', ['model_id' => $item->id]) }}">
                        Pilih Model
                    </x-filament::button>
                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>