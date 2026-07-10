<?php

namespace App\Filament\Widgets;

use App\Models\Room;
use Filament\Widgets\Widget;

class RoomStatusGrid extends Widget
{
    protected string $view = 'filament.widgets.room-status-grid';

    // Widget column span on dashboard
    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'rooms' => Room::with(['kategori', 'jenisPlaystation'])->get(),
        ];
    }
}
