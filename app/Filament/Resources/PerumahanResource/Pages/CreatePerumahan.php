<?php

namespace App\Filament\Resources\PerumahanResource\Pages;

use App\Filament\Resources\PerumahanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerumahan extends CreateRecord
{
    protected static string $resource = PerumahanResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }
}
