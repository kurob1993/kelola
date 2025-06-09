<?php

namespace App\Filament\Resources\BlokResource\Pages;

use App\Filament\Resources\BlokResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlok extends CreateRecord
{
    protected static string $resource = BlokResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index'); // ke table
    }
}
