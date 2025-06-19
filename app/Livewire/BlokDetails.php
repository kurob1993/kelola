<?php

namespace App\Livewire;

use App\Models\BlokDetail;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class BlokDetails extends BaseWidget
{
    public $blok_id;
    protected static ?string $heading = "";

    public function table(Table $table): Table
    {
        return $table
            ->query(BlokDetail::where("blok_id", $this->blok_id))
            ->columns([
                Tables\Columns\TextColumn::make('nama_blok'),
            ])->defaultPaginationPageOption(5);
    }
}
