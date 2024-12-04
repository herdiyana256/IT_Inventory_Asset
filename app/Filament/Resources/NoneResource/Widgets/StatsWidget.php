<?php

namespace App\Filament\Resources\NoneResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', 150)
                ->description('Total registered users')
                ->icon('heroicon-o-users') // Ikon untuk pengguna
                ->color('success'),

            Stat::make('Active Sessions', 20)
                ->description('Active sessions currently')
                ->icon('heroicon-o-chart-bar') // Ikon untuk sesi aktif
                ->color('warning'),

            Stat::make('Asset Maintenance', 50)
                ->description('Total assets under maintenance')
                ->icon('heroicon-o-wrench') // Ikon alat perbaikan
                ->color('danger'),

            Stat::make('Asset Usage', 300)
                ->description('Total asset usage instances')
                ->icon('heroicon-o-clipboard') // Ikon clipboard untuk pencatatan
                ->color('primary'),

            Stat::make('Categories', 15)
                ->description('Total number of categories')
                ->icon('heroicon-o-presentation-chart-bar') // Ikon yang sesuai
                ->color('secondary'),

            Stat::make('Logs', 1000)
                ->description('Total system logs')
                ->icon('heroicon-o-document-text') // Ikon dokumen untuk log
                ->color('indigo'),

           

            
        ];
    }
}
