<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\VendorContactResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class VendorContactRelationManager extends RelationManager
{
    protected static string $relationship = 'vendorContact';

    public function form(Form $form): Form
    {
        return $form
            ->schema(VendorContactResource::getAllFormField());
    }

    public function table(Table $table): Table
    {
        $user = $this->ownerRecord->vendorContact;

        return $table
            ->recordTitleAttribute('name')
            ->columns(VendorContactResource::getListTableColumns())
            ->filters([
                //
            ])
            ->headerActions([
                // hide create action button if data > 0
//                Tables\Actions\CreateAction::make()->hidden($user !== null),
//                Tables\Actions\AssociateAction::make()->hidden($user !== null),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
//                Tables\Actions\DissociateAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
