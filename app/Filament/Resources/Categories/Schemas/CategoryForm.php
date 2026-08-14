<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\{FileUpload, TextInput, Toggle};
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('slug')
                    ->required(),

                TextInput::make('icon')
                    ->default(null),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('categories')
                    ->visibility('public'),

                Toggle::make('is_featured')
                    ->required(),

                Toggle::make('is_active')
                    ->required(),

                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}