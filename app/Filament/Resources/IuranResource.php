<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IuranResource\Pages;
use App\Filament\Resources\IuranResource\RelationManagers;
use App\Models\Iuran;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
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

    protected static ?string $label = 'Iuran';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Data Master';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([ // Membungkus seluruh input dalam Card
                Grid::make([
                    'sm' => 1,
                    'md' => 3,
                ])->schema([
                    Forms\Components\TextInput::make('nama_iuran')
                        ->required()
                        ->label('Nama Iuran'),

                    Forms\Components\TextInput::make('nominal')
                        ->mask(RawJs::make('$money($input)'))
                        ->required()
                        ->label('Nominal'),

                    Forms\Components\Select::make('periode')
                        ->options(['bulanan' => 'Bulanan', 'tahunan' => 'Tahunan'])
                        ->required()
                        ->label('Periode'),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->columnSpan([
                            'md' => 3,
                        ])
                        ->rows(3),
                ]),
            ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_iuran')->label('Nama Iuran')->searchable(),
                Tables\Columns\TextColumn::make('nominal')->label('Nominal'),
                Tables\Columns\TextColumn::make('periode')->label('Periode')->sortable(),
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
            'index' => Pages\ListIurans::route('/'),
            'create' => Pages\CreateIuran::route('/create'),
            'edit' => Pages\EditIuran::route('/{record}/edit'),
        ];
    }
}
