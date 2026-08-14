<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\{IconColumn, ImageColumn, TextColumn};

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public'),
                TextColumn::make('discount_percentage')
                    ->label('Discount')
                    ->formatStateUsing(fn ($state) => $state ? "{$state}% OFF" : '—')
                    ->badge()
                    ->color(fn ($state) => $state ? 'danger' : 'gray'),

                TextColumn::make('unit')
                    ->placeholder('500g Pack')
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),

                // Replaced ->money('USD') to bypass intl
                TextColumn::make('price')
                    ->prefix('$')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('sale_price')
                    ->prefix('$')
                    ->numeric(decimalPlaces: 2)
                    ->sortable()
                    ->placeholder('-'),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),

                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}