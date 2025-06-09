<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Warga;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['role']);
        return $data;
    }

    protected function afterSave(): void
    {
        $roleId = Arr::wrap($this->form->getState()['role'])[0] ?? null;

        \Log::debug($roleId);

        // if $roleId is array get index 0

        $roleName = Role::findById($roleId)->name;

        $this->record->syncRoles([$roleName]);

        if($roleName === 'warga') {
            $warga = Warga::find($this->record->warga_id);
            $warga->nama = $this->record->name;
            $warga->email = $this->record->email;
            $warga->save();
        }
    }

}
