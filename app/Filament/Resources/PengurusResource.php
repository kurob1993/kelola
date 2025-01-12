<?php

namespace App\Filament\Resources;

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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Pengurus';

    protected static ?int $navigationSort = 6;

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
                        Select::make('gang_id')
                            ->label('Gang')
                            ->relationship(
                                name: 'gang',
                                titleAttribute: 'nama',
                            )
                            ->preload()
                            ->searchable()
                            ->required(),

                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship(
                                name: 'warga',
                                titleAttribute: 'nama',
                                modifyQueryUsing: function (Builder $query, Forms\Get $get) {
                                    $query->where('gang_id', $get('gang_id'));
                                }
                            )
                            ->getOptionLabelFromRecordUsing(fn(Warga $record) => "{$record->nama} - {$record->blok->nama_blok}{$record->nomor_rumah}")
                            ->preload()
                            ->searchable(['nama', 'nomor_rumah'])
                            ->live()
                            ->required(),

                        Select::make('jabatan')
                            ->label('Jabatan')
                            ->options([
                                'RT' => 'Ketua RT',
                                'Kordinator' => 'Kordinator Gang'
                            ])
                            ->required(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('warga.nama')
                    ->label('Nama Pengurus')
                    ->searchable(),

                TextColumn::make('warga.gang.nama')
                    ->label('Gang')
                    ->searchable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
