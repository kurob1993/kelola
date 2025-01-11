<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WargaResource\Pages;
use App\Filament\Resources\WargaResource\RelationManagers;
use App\Models\Blok;
use App\Models\Perumahan;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Warga';

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
                    Forms\Components\TextInput::make('nama')->required()->label('Nama'),
                    Forms\Components\TextInput::make('gang')->required()->label('Gang'),
                    Forms\Components\Select::make('blok_id')
                        ->label('Blok')
                        ->options(Blok::all()->pluck('nama_blok', 'id'))
                        ->required(),
                    Forms\Components\Select::make('perumahan_id')
                        ->label('Perumahan')
                        ->options(Perumahan::all()->pluck('nama_perumahan', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('nomor_rumah')->required()->label('Nomor Rumah'),
                    Forms\Components\TextInput::make('no_telepon')->label('No Telepon'),
                    Forms\Components\TextInput::make('email')->email()->label('Email'),
                    Forms\Components\DatePicker::make('tanggal_daftar')->required()->label('Tanggal Daftar'),
                ])
            ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('gang')->label('Gang')->searchable(),
                Tables\Columns\TextColumn::make('blok_id')
                    ->getStateUsing(function ($record) {
                        return $record->blok->nama_blok . '-' . $record->nomor_rumah;
                    })
                    ->label('Blok')
                    ->sortable(),
            ])
            ->filters([
                // filter by blok.nama_blok dan nomor_rumah
                Tables\Filters\SelectFilter::make('blok_id')
                    ->options(Blok::all()->pluck('nama_blok', 'id'))
                    ->label('Blok'),

                // filter by nomor_rumah
//                Tables\Filters\SelectFilter::make('nomor_rumah')
//                    ->options(function (Table $table) {
//                        $blok_id = $table->getFilter('nomor_rumah');
//
//                        \Log::debug(json_encode($blok_id));
//                        return Warga::where('blok_id', 1)
//                            ->orderBy('nomor_rumah')
//                            ->get()
//                            ->pluck('gang');
//                    })
//                    ->label('Nomor Rumah'),

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
            'index' => Pages\ListWargas::route('/'),
            'create' => Pages\CreateWarga::route('/create'),
            'edit' => Pages\EditWarga::route('/{record}/edit'),
        ];
    }
}
