<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
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
        $roleId = $this->form->getState()['role'];
        $roleName = Role::findById($roleId)->name;

        $this->record->syncRoles([$roleName]);
    }
}
