<?php

namespace App\Filament\Resources;

use App\Enums\Jabatan;
use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Blok;
use App\Models\Gang;
use App\Models\Pengurus;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Pengurus';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([ // Membungkus seluruh input dalam Card
                    Grid::make([
                        'sm' => 1,
                        'md' => 2,
                    ])->schema([
                        Select::make('blok_id')
                            ->label('Blok')
                            ->relationship(
                                name: 'blok',
                                titleAttribute: 'nama_blok',
                            )
                            ->preload()
                            ->searchable()
                            ->required(),

                        Select::make('gang_id')
                            ->label('Gang')
                            ->relationship(
                                name: 'gang',
                                titleAttribute: 'nama',
                            )
                            ->preload()
                            ->searchable(),

                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship(
                                name: 'warga',
                                titleAttribute: 'nama',
                                modifyQueryUsing: function (Builder $query, Forms\Get $get) {
                                    $query->whereHas('blokDetail', function (Builder $query) use ($get) {
                                        $query->where('blok_id', $get('blok_id'));
                                    });
                                }
                            )
                            ->getOptionLabelFromRecordUsing(fn(Warga $record) => "{$record->nama} - {$record->blokDetail->nama_blok}{$record->nomor_rumah}")
                            ->preload()
                            ->searchable(['nama', 'nomor_rumah'])
                            ->live()
                            ->required(),

                        Select::make('jabatan')
                            ->label('Jabatan')
                            ->options(
                                collect(Jabatan::cases())->mapWithKeys(fn($case) => [
                                    $case->name => $case->value
                                ])->toArray()
                            )
                            ->required(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_waraga')
                    ->getStateUsing(function ($record) {
                        return "{$record->warga->nama} -
                            {$record->warga->blokDetail->nama_blok}{$record->warga->nomor_rumah}
                            ({$record->warga->gang->nama})
                        ";
                    })
                    ->label('Nama Pengurus')
                    ->searchable(),

                TextColumn::make('blok.nama_blok')
                    ->label('Blok')
                    ->searchable(),

                TextColumn::make('gang.nama')
                    ->label('Gang')
                    ->searchable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->getStateUsing(fn($record) => Jabatan::fromName($record->jabatan))
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\RestoreAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
