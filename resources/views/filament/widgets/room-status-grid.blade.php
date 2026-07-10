<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold tracking-tight text-gray-900 dark:text-white">Status Room Real-Time</span>
                <span class="text-[10px] text-gray-400 dark:text-gray-500">Live Status</span>
            </div>
        </x-slot>

        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-2">
            @foreach ($rooms as $room)
                @php
                    $badgeClass = match ($room->status_room) {
                        'tersedia' => 'text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/5 ring-emerald-600/10 dark:ring-emerald-400/10',
                        'dipakai' => 'text-rose-700 dark:text-rose-400 bg-rose-50 dark:bg-rose-500/5 ring-rose-600/10 dark:ring-rose-400/10',
                        'maintenance' => 'text-amber-700 dark:text-amber-400 bg-amber-50 dark:bg-amber-500/5 ring-amber-600/10 dark:ring-amber-400/10',
                        default => 'text-gray-700 dark:text-gray-400 bg-gray-50 dark:bg-gray-500/5 ring-gray-600/10 dark:ring-gray-400/10',
                    };
                    
                    $dotClass = match ($room->status_room) {
                        'tersedia' => 'bg-emerald-500',
                        'dipakai' => 'bg-rose-500',
                        'maintenance' => 'bg-amber-500',
                        default => 'bg-gray-500',
                    };
                    
                    $statusLabel = match ($room->status_room) {
                        'tersedia' => 'Tersedia',
                        'dipakai' => 'Dipakai',
                        'maintenance' => 'Maintenance',
                        default => ucfirst($room->status_room),
                    };
                @endphp

                <div class="relative rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-2.5 shadow-sm transition-all duration-200 hover:border-gray-300 dark:hover:border-gray-700">
                    <div class="flex flex-col justify-between h-full space-y-2">
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-[9px] font-mono font-semibold text-gray-400 dark:text-gray-500 tracking-wider">
                                    {{ $room->kode_room }}
                                </span>
                                
                                <!-- Status Badge (extra flat minimal design) -->
                                <span class="inline-flex items-center gap-x-1 rounded px-1.5 py-0.5 text-[9px] font-semibold ring-1 ring-inset {{ $badgeClass }}">
                                    <span class="h-1 w-1 rounded-full {{ $dotClass }}"></span>
                                    {{ $statusLabel }}
                                </span>
                            </div>

                            <h3 class="text-xs font-bold text-gray-950 dark:text-white leading-tight">
                                {{ $room->nama_room }}
                            </h3>
                            
                            <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5">
                                Kategori: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $room->kategori?->nama_kategori ?? '-' }}</span>
                            </p>
                        </div>

                        <div class="pt-1.5 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between text-[10px]">
                            <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
                                <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 21L14.907 18M18 10.5c0 3.23-2.087 5.972-5 7.008M18 10.5a5.5 5.5 0 11-11 0 5.5 5.5 0 0111 0zM12 10.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                </svg>
                                <span>{{ $room->jenisPlaystation?->nama_playstation ?? '-' }}</span>
                            </div>
                            
                            <div class="text-right">
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    Rp {{ number_format($room->harga_per_jam, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
