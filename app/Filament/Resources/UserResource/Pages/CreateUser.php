<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Pengurus;
use App\Models\Perumahan;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Role;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['role']);
        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;
        $roleId = $record->role;
        $roleName = Role::findById($roleId)->name;

        $this->record->syncRoles([$roleName]);

        if($roleName === 'admin' || $roleName === 'kordinator') {
            $pengurus = Pengurus::where('warga_id', $record->warga_id)->firstOrNew();
            $pengurus->warga_id = $record->warga->id;
            $pengurus->gang_id = $record->warga->gang_id;
            $pengurus->blok_id = $record->warga->blokDetail->blok_id;
            $pengurus->jabatan = $roleName === 'admin' ? 'RT': 'KORDINATOR';
            $pengurus->save();
        }
    }
}
