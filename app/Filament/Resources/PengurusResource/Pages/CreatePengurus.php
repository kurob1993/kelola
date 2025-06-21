<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreatePengurus extends CreateRecord
{
    protected static string $resource = PengurusResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }

    protected function afterCreate(): void
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
