<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WargaResource\Pages;
use App\Filament\Resources\WargaResource\RelationManagers;
use App\Models\Blok;
use App\Models\Gang;
use App\Models\Perumahan;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Warga';

    protected static ?int $navigationSort = 4;

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
                        ->columnSpan(2)
                        ->label('Perumahan')
                        ->options(Perumahan::all()->pluck('nama_perumahan', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('nama')->required()->label('Nama'),
                    Forms\Components\Select::make('blok_detail_id')
                        ->label('Blok')
                        ->relationship('blokDetail', 'nama_blok')
                        ->preload()
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('gang_id')
                        ->label('Gang')
                        ->relationship('gang', 'nama')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('nomor_rumah')->required()->label('Nomor Rumah'),
                    Forms\Components\TextInput::make('no_telepon')
                        ->default('+62 ')
                        ->required()
                        ->label('No Telepon'),
                    Forms\Components\TextInput::make('email')->email()->required()->label('Email'),
                ])
            ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('perumahan.nama_perumahan')->label('Perumahan')->searchable(),
                Tables\Columns\TextColumn::make('gang.nama')->label('Gang')->searchable(),
                Tables\Columns\TextColumn::make('blokDetail.nama_blok')->label('Blok')->sortable(),
                Tables\Columns\TextColumn::make('nomor_rumah')->label('Nomor Rumah'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->date('d F Y'),
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
            'index' => Pages\ListWargas::route('/'),
            'create' => Pages\CreateWarga::route('/create'),
            'edit' => Pages\EditWarga::route('/{record}/edit'),
        ];
    }
}
