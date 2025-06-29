<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiPengeluaranResource\Pages;
use App\Filament\Resources\TransaksiPengeluaranResource\RelationManagers\TransaksiPengeluaranDetailRelationManager;
use App\Models\TransaksiPengeluaran;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransaksiPengeluaranResource extends Resource
{
    protected static ?string $model = TransaksiPengeluaran::class;

    protected static ?string $pluralLabel = 'Pengeluaran';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return __('kelola.nav.transaction');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    DatePicker::make('tanggal')->required(),
                    TextInput::make('dibuat_oleh')
                        ->default(\Auth::user()->name)
                        ->readOnly()
                        ->required(),
                    Textarea::make('keterangan')->rows(10),
                    FileUpload::make('bukti_url')
                         ->imagePreviewHeight('250')
                        ->directory('bukti-pengeluaran')
                        ->nullable(),
                ])->columns([
                    'md' => 2,
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->searchable(),

//                TextColumn::make('dibuat_oleh')
//                    ->label('Dibuat Oleh')
//                    ->sortable()
//                    ->searchable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),

                TextColumn::make('total_pengeluaran')
                    ->label('Total')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2))
                    ->sortable(),
                TextColumn::make('bukti_url')
                    ->label('Bukti')
                    ->url(fn($record) => $record ? asset('storage/' . $record->bukti_url) : 'javascript:void(0)')
                    ->openUrlInNewTab()
                    ->wrap(),
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
            TransaksiPengeluaranDetailRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksiPengeluarans::route('/'),
            'create' => Pages\CreateTransaksiPengeluaran::route('/create'),
            'edit' => Pages\EditTransaksiPengeluaran::route('/{record}/edit'),
        ];
    }
}
