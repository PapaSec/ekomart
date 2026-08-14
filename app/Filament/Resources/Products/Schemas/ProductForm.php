<?php

namespace App\Filament\Resources\Products\Schemas;

use Illuminate\Support\Str;

use Filament\Forms\Components\{FileUpload, Grid, Group, MarkdownEditor, Section, Select, TextInput, Toggle};
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Main Content Column (Left Side - 2/3 width)
                Group::make()->schema([
                    Section::make('Product Details')->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        TextInput::make('unit')
                            ->placeholder('e.g. 500g Pack, 1kg')
                            ->default('500g Pack'),

                        MarkdownEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Pricing & Inventory')->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('$')
                            ->required(),

                        TextInput::make('sale_price')
                            ->numeric()
                            ->prefix('$')
                            ->helperText('Leave empty if product is not on discount'),

                        TextInput::make('quantity')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])->columns(3),
                ])->columnSpan(2),

                // Sidebar Column (Right Side - 1/3 width)
                Group::make()->schema([
                    Section::make('Product Image')->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->disk('public')
                            ->imageEditor()
                            ->required(),
                    ]),

                    Section::make('Status & Visibility')->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->label('Featured'),
                    ]),
                ])->columnSpan(1),
            ])
            ->columns(3);
    }
}