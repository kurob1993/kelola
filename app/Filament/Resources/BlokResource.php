<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlokResource\Pages;
use App\Filament\Resources\BlokResource\RelationManagers;
use App\Livewire\BlokDetails;
use App\Models\Blok;
use App\Models\Perumahan;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class BlokResource extends Resource
{
    protected static ?string $model = Blok::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Blok';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make([
                    'sm' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\Select::make('perumahan_id')
                        ->label('Perumahan')
                        ->options(Perumahan::all()->pluck('nama_perumahan', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('nama_blok')->required()->label('Nama Blok'),
                ])
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('nama_blok', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('perumahan.nama_perumahan')->label('Perumahan')->sortable(),
                Tables\Columns\TextColumn::make('nama_blok')->label('Nama Blok')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->modalSubmitAction(false)
                    ->modalContentFooter(fn($record) => view('components.master.blok.blok-detail', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BlokDetailRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBloks::route('/'),
            'create' => Pages\CreateBlok::route('/create'),
            'edit' => Pages\EditBlok::route('/{record}/edit'),
        ];
    }
}
