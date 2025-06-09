<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Warga;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Rawilk\FilamentPasswordInput\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

//    protected static ?string $navigationGroup = trans('filament-shield::filament-shield.nav.group');

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 100;

    public static function getNavigationGroup(): ?string
    {
        return __('filament-shield::filament-shield.nav.group'); // Ambil dari file lang
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([ // Membungkus seluruh input dalam Card
                    Grid::make([
                        'sm' => 1,
                        'md' => 2,
                    ])->schema(static::getFormField()),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {

        $livewire = $table->getLivewire();

        return $table
            ->columns($livewire->isGridLayout()
                ? static::getGridTableColumns()
                : static::getListTableColumns())
            ->contentGrid(
                fn() => $livewire->isListLayout()
                    ? null
                    : [
                        'md' => 2,
                        'lg' => 3,
                        'xl' => 4,
                    ]
            )
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->placeholder('Filter by Role')
                    ->relationship('roles', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ])
            ->actions([
                Action::make('changePassword')
                    ->form([
                        Password::make('password')
                            ->confirmed()
                            ->label('Password'),
                        Password::make('password_confirmation')
                            ->dehydrated(false),
                    ])
                    ->action(function (array $data, User $record) {
                        $record->password = bcrypt($data['password']);
                        $record->save();
                    })
                    ->closeModalByClickingAway(false)
                    ->icon('heroicon-o-key')
                    ->color('success')
                    ->iconButton()
                    ->tooltip('Ganti Password'),

                Tables\Actions\ViewAction::make()->iconButton()->tooltip('View'),
                Tables\Actions\EditAction::make()->iconButton()->modal()
                    ->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->iconButton()->tooltip('Delete'),
                Tables\Actions\ForceDeleteAction::make()->iconButton()->tooltip('Force Delete'),
                Tables\Actions\RestoreAction::make()->iconButton()->tooltip('Restore'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
//                    Tables\Actions\ForceDeleteBulkAction::make(),
//                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->recordAction(Tables\Actions\ViewAction::class)
            ->recordUrl(null);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable()->sortable()->toggleable(),
            TextColumn::make('email')->searchable()->sortable()->toggleable(),
            TextColumn::make('roles.name')
                ->label('Roles')
                ->badge()
                ->icon('heroicon-o-shield-check')
                ->color('success'),
            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(),
            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
        ];
    }

    public static function getGridTableColumns(): array
    {
        return [
            Tables\Columns\Layout\Stack::make(
                self::getListTableColumns()
            )
        ];
    }

    public static function getFormField(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            Select::make('warga_id')
                ->label('Warga')
                ->relationship(
                    name: 'warga',
                    titleAttribute: 'nama',
                    modifyQueryUsing: function (Builder $query, $state) {
                        $query->orWhere('nama', 'like', "%{$state}%")
                            ->orWhere('nomor_rumah', 'like', "%{$state}%")
                            ->orWhereHas('blok', function ($query) use ($state) {
                                $query->where('nama_blok', 'like', "%{$state}%");
                            });
                    }
                )
                ->getOptionLabelFromRecordUsing(fn(Warga $record) => "{$record->nama} - {$record->blok->nama_blok}{$record->nomor_rumah}")
                ->preload()
                ->searchable()
                ->live()
                ->required(),

            TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete(false)
                ->unique(ignoreRecord: true),

            Select::make('role')
                ->label('Role')
                ->relationship('roles', 'name')
                ->preload()
                ->required()
                ->searchable()
                ->multiple(false)
                ->default(fn(?User $record) => $record?->roles()->first()?->id ?? null),

            Password::make('password')
                ->confirmed()
                ->visible(fn(string $context): bool => $context === 'create')
                ->label('Password'),

            Password::make('password_confirmation')
                ->visible(fn(string $context): bool => $context === 'create')
                ->dehydrated(false),
        ];
    }
}
