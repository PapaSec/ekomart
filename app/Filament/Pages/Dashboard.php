<?php

namespace App\Filament\Pages;

use BackedEnum;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?int $navigationSort = -10;
}