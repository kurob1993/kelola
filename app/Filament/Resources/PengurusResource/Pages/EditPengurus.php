<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditPengurus extends EditRecord
{
    protected static string $resource = PengurusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $record = $this->record;

        $user = User::where('email', $record->warga->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $record->warga->nama;
            $user->email = $record->warga->email;
            $user->warga_id = $record->warga->id;
            $user->password = Hash::make('123123');
            $user->save();
        }

        $role = 'kordinator';
        if ($record->jabatan === 'RT') {
            $role = 'admin';
        }

        $user->syncRoles([$role]);
    }
}
