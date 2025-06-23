<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiIuranResource\Pages;
use App\Filament\Resources\TransaksiIuranResource\RelationManagers;
use App\Models\Gang;
use App\Models\Iuran;
use App\Models\Perumahan;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class TransaksiIuranResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = TransaksiIuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

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
                    Forms\Components\DatePicker::make('tanggal_bayar')
                        ->default(Carbon::now()->endOfMonth()->toDateString())
                        ->label('Jatuh Tempo')
                        ->required(),
                    Forms\Components\Select::make('status_bayar')
                        ->default('belum lunas')
                        ->options(['lunas' => 'Lunas', 'belum lunas' => 'Belum Lunas', 'tertunda' => 'Tertunda'])
                        ->required()
                        ->label('Status Bayar'),
                    Forms\Components\Select::make('metode_bayar')
                        ->options(['cash', 'transfer', 'online'])
                        ->label('Metode Bayar'),
                    Forms\Components\FileUpload::make('bukti_bayar')
                        ->columnSpan(['md' => 2])
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
                Tables\Columns\TextColumn::make('tanggal_bayar')->label('Jatuh Tempo')->date('d F Y'),
                Tables\Columns\TextColumn::make('metode_bayar')->label('Metode Bayar'),
                Tables\Columns\TextColumn::make('total_iuran')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2))
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

                Tables\Filters\SelectFilter::make('perumahan_id_filter')
                    ->label('Perumahan')
                    ->options(fn() => Perumahan::pluck('nama_perumahan', 'id'))
                    ->searchable()
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        if ($state['value']) {
                            $query->whereHas('warga.gang', function ($q) use ($state) {
                                $q->where('perumahan_id', $state['value']);
                            });
                        }
                    }),

                // filter by gang
                Tables\Filters\SelectFilter::make('gang_id')
                    ->label('Gang')
                    ->options(Gang::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        return $query->whereHas('warga', fn($q) => $state['value'] ? $q->where('gang_id', $state['value']) : null);
                    }),
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
            RelationManagers\TransaksiIuranDetailsRelationManager::class,
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
