<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiIuranResource\Pages;
use App\Filament\Resources\TransaksiIuranResource\RelationManagers;
use App\Models\Iuran;
use App\Models\TransaksiIuran;
use App\Models\Warga;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class TransaksiIuranResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = TransaksiIuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Iuran Warga';

    protected static ?int $navigationSort = 6;

//    protected static ?string $navigationGroup = 'Transaksi';
    public static function getNavigationGroup(): ?string
    {
        return __('kelola.nav.transaction'); // Ambil dari file lang
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make([
                    'sm' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\Select::make('warga_id')
                        ->label('Warga')
                        ->options(Warga::all()->pluck('nama', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('iuran_id')
                        ->label('Iuran')
                        ->options(Iuran::all()->pluck('nama_iuran', 'id')->mapWithKeys(function ($nama, $id) {
                            $iuran = Iuran::find($id);

                            return [$id => "$nama - Rp " . number_format($iuran->nominal, 0, ',', '.')];
                        }))
                        ->required(),
                    Forms\Components\DatePicker::make('tanggal_bayar')->label('Jatuh Tempo')->required(),
                    Forms\Components\Select::make('status_bayar')
                        ->options(['lunas' => 'Lunas', 'belum lunas' => 'Belum Lunas', 'tertunda' => 'Tertunda'])
                        ->required()
                        ->label('Status Bayar'),
                    Forms\Components\FileUpload::make('bukti_bayar')
                        ->label('Bukti Bayar')
                        ->image() // Membatasi hanya untuk gambar
                        ->directory('bukti_bayar') // Folder tempat file akan disimpan
                        ->maxSize(2048) // Ukuran maksimum file (dalam KB)
                        ->helperText('Unggah bukti pembayaran dalam format gambar (max 2 MB).'),
                ])
            ]),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('warga.nama')->label('Warga')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('iuran.nama_iuran')->label('Iuran')->searchable(),
                Tables\Columns\TextColumn::make('tanggal_bayar')->label('Jatuh Tempo')->date('d F Y'),
                Tables\Columns\TextColumn::make('iuran.nominal')
                    ->numeric(thousandsSeparator: '.')
                    ->label('Nominal'),
                Tables\Columns\TextColumn::make('status_bayar')
                    ->formatStateUsing(fn(string $state): string => strtoupper($state))
                    ->badge()
                    ->color(fn(TransaksiIuran $record) => match ($record->status_bayar) {
                        'lunas' => 'success',
                        'belum lunas' => 'danger',
                        'tertunda' => 'warning',
                    })
                    ->label('Status Bayar'),
            ])
            ->groups([
                Group::make('warga.nama')
                    ->label('Nama Warga')
                    ->collapsible(),
            ])
            ->filters([
                // filter by status bayar
                Tables\Filters\SelectFilter::make('status_bayar')
                    ->options([
                        'lunas' => 'Lunas',
                        'belum lunas' => 'Belum Lunas',
                        'tertunda' => 'Tertunda',
                    ])
                    ->label('Status Bayar'),

                // filter by nama warga
                Tables\Filters\SelectFilter::make('warga_id')
                    ->options(Warga::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->label('Warga'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('bukti_bayar')
                    ->icon('heroicon-o-eye')
                    ->modalContent(fn($record) => view('components.transaksi.iuran.modal-bukti-bayar', [
                        'imageUrl' => asset('storage/' . $record->bukti_bayar),
                    ]))
                    ->modalWidth('max-w-2xl')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close'),
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
            'index' => Pages\ListTransaksiIurans::route('/'),
            'create' => Pages\CreateTransaksiIuran::route('/create'),
            'edit' => Pages\EditTransaksiIuran::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
            'generate',
        ];
    }
}
