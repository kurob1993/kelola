<?php

namespace App\Filament\Resources\PerumahanResource\Pages;

use App\Filament\Resources\PerumahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerumahans extends ListRecords
{
    protected static string $resource = PerumahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
