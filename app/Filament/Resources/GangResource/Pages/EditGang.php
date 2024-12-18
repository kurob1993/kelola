<?php

namespace App\Filament\Resources\GangResource\Pages;

use App\Filament\Resources\GangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGang extends EditRecord
{
    protected static string $resource = GangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
