<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiPengeluaranResource\Pages;
use App\Filament\Resources\TransaksiPengeluaranResource\RelationManagers\TransaksiPengeluaranDetailRelationManager;
use App\Models\TransaksiPengeluaran;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

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
                TextColumn::make('dibuat_oleh')
                    ->label('Dibuat Oleh')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),

                TextColumn::make('total_pengeluaran')
                    ->label('Total')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 2))
                    ->sortable(),

                TextColumn::make('transaksiPengeluaranDetails.kategoriTransaksi.nama')
                    ->label('Kategori')
                    ->badge()
                    ->color(function ($state) {
                        $colors = [
                            Color::rgb('rgb(244, 67, 54)'),   // Merah (Red)
                            Color::rgb('rgb(33, 150, 243)'),  // Biru (Blue)
                            Color::rgb('rgb(76, 175, 80)'),   // Hijau (Green)
                            Color::rgb('rgb(255, 193, 7)'),   // Kuning (Amber)
                            Color::rgb('rgb(156, 39, 176)'),  // Ungu (Purple)
                            Color::rgb('rgb(255, 87, 34)'),   // Oranye (Deep Orange)
                            Color::rgb('rgb(0, 188, 212)'),   // Cyan
                            Color::rgb('rgb(121, 85, 72)'),   // Coklat (Brown)
                            Color::rgb('rgb(96, 125, 139)'),  // Biru Abu (Blue Grey)
                            Color::rgb('rgb(63, 81, 181)'),   // Indigo
                        ];

                        // Generate index based on hash of value
                        $index = crc32(strtolower($state)) % count($colors);
                        return $colors[$index] ?? 'gray';
                    }),
            ])
            ->filters([
                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('start_date')->label('Mulai'),
                        DatePicker::make('end_date')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start_date'], fn($q) => $q->whereDate('tanggal', '>=', $data['start_date']))
                            ->when($data['end_date'], fn($q) => $q->whereDate('tanggal', '<=', $data['end_date']));
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['start_date'] ?? null) {
                            $indicators[] = Indicator::make('Mulai ' . Carbon::parse($data['start_date'])->toFormattedDateString())
                                ->removeField('tanggal');
                        }

                        if ($data['end_date'] ?? null) {
                            $indicators[] = Indicator::make('Sampai ' . Carbon::parse($data['end_date'])->toFormattedDateString())
                                ->removeField('tanggal');
                        }

                        return $indicators;
                    })
            ])
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Bukti Pengeluaran')
                    ->icon('heroicon-o-eye')
                    ->modalContent(fn($record) => view('components.transaksi.iuran.modal-bukti-bayar', [
                        'data' => $record->bukti_url,
                        'imageUrl' => asset('storage/' . $record->bukti_url),
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
