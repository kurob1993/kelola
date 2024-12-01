<?php

namespace App\Filament\Resources\BlokResource\Pages;

use App\Filament\Resources\BlokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBloks extends ListRecords
{
    protected static string $resource = BlokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
