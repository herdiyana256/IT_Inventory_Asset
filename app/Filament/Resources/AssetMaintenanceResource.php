<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetMaintenanceResource\Pages;
use App\Models\AssetMaintenance;
use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class AssetMaintenanceResource extends Resource
{
    protected static ?string $model = AssetMaintenance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id')) // Mengambil data produk
                    ->required(),

                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id')) // Mengambil data pengguna
                    ->required(),

                Forms\Components\TextInput::make('maintenance_type')
                    ->label('Maintenance Type')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),

                Forms\Components\DatePicker::make('maintenance_date')
                    ->label('Maintenance Date')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Menggunakan TextColumn untuk menampilkan nama produk dari relasi
                TextColumn::make('product.name')
                ->label('Product'),

                // Menggunakan TextColumn untuk menampilkan nama pengguna dari relasi
                TextColumn::make('user.name')
                    ->label('User'),

                TextColumn::make('maintenance_type')
                    ->label('Maintenance Type'),

                TextColumn::make('description')
                    ->label('Description'),

                    TextColumn::make('maintenance_date')
                    ->label('Maintenance Date')
                    // ->sortable(),
            ])
            ->filters([/* Filter yang sesuai */])
            ->actions([/* Action sesuai kebutuhan */])
            ->bulkActions([/* Bulk action sesuai kebutuhan */]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetMaintenances::route('/'),
            'create' => Pages\CreateAssetMaintenance::route('/create'),
            'edit' => Pages\EditAssetMaintenance::route('/{record}/edit'),
        ];
    }
}
