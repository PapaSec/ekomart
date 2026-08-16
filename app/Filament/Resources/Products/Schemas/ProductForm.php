<?php

namespace App\Filament\Resources\Products\Schemas;

use Illuminate\Support\Str;

use Filament\Forms\Components\{FileUpload, MarkdownEditor, Select, TagsInput, TextInput, Textarea, Toggle};
use Filament\Schemas\Schema;
use Filament\Schemas\Components\{Grid, Section};

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Main Content Column (Left Side - Spans 2 Columns)
                Grid::make(1)
                    ->schema([
                        Section::make('Product Details')->schema([
                            TextInput::make('name')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),

                            TextInput::make('sku')
                                ->label('SKU')
                                ->unique(ignoreRecord: true)
                                ->placeholder('e.g. NES-CER-001'),

                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->searchable()
                                ->preload(),

                            Select::make('vendor_id')
                                ->label('Vendor')
                                ->relationship('vendor', 'name')
                                ->searchable()
                                ->preload(),

                            TextInput::make('unit')
                                ->placeholder('e.g. 500g Pack, 1kg')
                                ->default('500g Pack'),

                            TextInput::make('product_type')
                                ->placeholder('e.g. Organic, Original'),

                            TextInput::make('shelf_life')
                                ->placeholder('e.g. 12 Months'),

                            TextInput::make('sort_order')
                                ->numeric()
                                ->default(0),

                            Textarea::make('short_description')
                                ->rows(3)
                                ->columnSpanFull(),

                            MarkdownEditor::make('description')
                                ->columnSpanFull(),

                            MarkdownEditor::make('additional_info')
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

                            TextInput::make('stock') // Matched to 'stock' column (was 'quantity')
                                ->numeric()
                                ->default(0)
                                ->required(),

                            TagsInput::make('tags')
                                ->placeholder('Add tag...')
                                ->columnSpanFull(),
                        ])->columns(3),
                    ])
                    ->columnSpan(2),

                // Sidebar Column (Right Side - Spans 1 Column)
                Grid::make(1)
                    ->schema([
                        Section::make('Featured Image')->schema([
                            FileUpload::make('featured_image') // Matched to 'featured_image' column (was 'image')
                                ->image()
                                ->directory('products')
                                ->disk('public')
                                ->imageEditor()
                                ->required(),
                        ]),

                        Section::make('Product Gallery')->schema([
                            FileUpload::make('images')
                                ->image()
                                ->multiple()
                                ->directory('products/gallery')
                                ->disk('public')
                                ->reorderable(),
                        ]),

                        Section::make('Status & Visibility')->schema([
                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true),

                            Toggle::make('is_featured')
                                ->label('Featured'),

                            Toggle::make('in_stock')
                                ->label('In Stock')
                                ->default(true),
                        ]),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }
}