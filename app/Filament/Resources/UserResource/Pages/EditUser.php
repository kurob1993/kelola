<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Pengurus;
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

        // if $roleId is array get index 0

        $roleName = Role::findById($roleId)->name;

        $this->record->syncRoles([$roleName]);

        if($roleName === 'warga') {
            $warga = Warga::find($this->record->warga_id);
            $warga->nama = $this->record->name;
            $warga->email = $this->record->email;
            $warga->save();
        }

        if($roleName === 'admin' || $roleName === 'kordinator') {
            $pengurus = Pengurus::where('warga_id', $this->record->warga_id)->firstOrNew();
            $pengurus->warga_id = $this->record->warga->id;
            $pengurus->gang_id = $this->record->warga->gang_id;
            $pengurus->blok_id = $this->record->warga->blokDetail->blok_id;
            $pengurus->jabatan = $roleName === 'admin' ? 'RT': 'KORDINATOR';
            $pengurus->save();
        }
    }

}
