<?php

namespace App\Filament\Resources\GangResource\Pages;

use App\Filament\Resources\GangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGangs extends ListRecords
{
    protected static string $resource = GangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
