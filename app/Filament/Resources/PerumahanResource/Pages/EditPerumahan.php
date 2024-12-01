<?php

namespace App\Filament\Resources\PerumahanResource\Pages;

use App\Filament\Resources\PerumahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerumahan extends EditRecord
{
    protected static string $resource = PerumahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
