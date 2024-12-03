<?php

namespace App\Filament\Resources\IuranResource\Pages;

use App\Filament\Resources\IuranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIuran extends EditRecord
{
    protected static string $resource = IuranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        $this->record->nominal = str_replace(',', '', $this->record->nominal);
    }
}
