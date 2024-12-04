<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\AssetMaintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\HasManyColumn;
use Filament\Tables\Columns\BelongsToColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Product Name')
                    ->required(),

                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),

                // Menambahkan relasi dengan AssetMaintenance menggunakan Repeater
                Forms\Components\Repeater::make('assetMaintenances') // Menampilkan relasi AssetMaintenance
                    ->relationship('assetMaintenances') // Relasi yang telah dibuat di model Product
                    ->schema([
                        Forms\Components\TextInput::make('maintenance_type')
                            ->label('Maintenance Type')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required(),
                    ])
                    ->label('Asset Maintenance'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Product Name'),
                TextColumn::make('description')->label('Description'),

                // Menambahkan kolom relasi untuk AssetMaintenance menggunakan HasManyColumn
                HasManyColumn::make('assetMaintenances') // Menggunakan HasManyColumn untuk relasi hasMany
                    ->label('Maintenance Count')
                    ->getTable()->column('maintenance_type'),
            ])
            ->filters([/* Filter yang sesuai */])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
