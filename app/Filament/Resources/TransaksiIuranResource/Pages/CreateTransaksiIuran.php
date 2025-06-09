<?php

namespace App\Filament\Resources\TransaksiIuranResource\Pages;

use App\Filament\Resources\TransaksiIuranResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaksiIuran extends CreateRecord
{
    protected static string $resource = TransaksiIuranResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }
}
