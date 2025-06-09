<?php

namespace App\Filament\Resources\WargaResource\Pages;

use App\Filament\Resources\WargaResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWarga extends EditRecord
{
    protected static string $resource = WargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $record = $this->record;

        $user = User::where('warga_id', $record->id)->first();
        $user->name = $record->nama;
        $user->email = $record->email;
        $user->password = bcrypt('12345678');
        $user->warga_id = $record->id;
        $user->save();

        $user->syncRoles(['warga']);
    }
}
