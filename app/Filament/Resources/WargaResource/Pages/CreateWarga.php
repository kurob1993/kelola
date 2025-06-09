<?php

namespace App\Filament\Resources\WargaResource\Pages;

use App\Filament\Resources\WargaResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWarga extends CreateRecord
{
    protected static string $resource = WargaResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        $user = new User();
        $user->name = $record->nama;
        $user->email = $record->email;
        $user->password = bcrypt('12345678');
        $user->warga_id = $record->id;
        $user->save();

        $user->syncRoles(['warga']);
    }
}
