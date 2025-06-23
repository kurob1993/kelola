<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IuranResource\Pages;
use App\Filament\Resources\IuranResource\RelationManagers;
use App\Models\Gang;
use App\Models\Iuran;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IuranResource extends Resource
{
    protected static ?string $model = Iuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Iuran';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Data Master';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([ // Membungkus seluruh input dalam Card
                Grid::make([
                    'sm' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\TextInput::make('nama_iuran')
                        ->required()
                        ->label('Nama Iuran'),

                    Forms\Components\TextInput::make('nominal')
                        ->mask(RawJs::make('$money($input)'))
                        ->maxLength(10)
                        ->required()
                        ->label('Nominal'),

                    Forms\Components\Select::make('periode')
                        ->options(['bulanan' => 'Bulanan', 'tahunan' => 'Tahunan'])
                        ->required()
                        ->label('Periode'),

                    Forms\Components\Select::make('gang_id')
                        ->label('Gang')
                        ->placeholder(__('kelola.all'))
                        ->options(Gang::all()->pluck('nama', 'id')),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->columnSpan([
                            'md' => 2,
                        ])
                        ->rows(2),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_iuran')->label('Nama Iuran')->searchable(),
                Tables\Columns\TextColumn::make('nominal')
                    ->numeric()
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2))
                    ->label('Nominal'),
                Tables\Columns\TextColumn::make('periode')
                    ->label('Periode')
                    ->sortable(),
                Tables\Columns\TextColumn::make('id')
                    ->label('Gang')
                    ->formatStateUsing(fn($record) => $record->gang ? $record->gang->nama : 'ALL')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIurans::route('/'),
            'create' => Pages\CreateIuran::route('/create'),
            'edit' => Pages\EditIuran::route('/{record}/edit'),
        ];
    }
}
