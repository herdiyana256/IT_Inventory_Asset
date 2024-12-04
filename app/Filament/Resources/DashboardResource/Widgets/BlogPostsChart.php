<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Asset Usage and Maintenance';

    protected function getData(): array
    {
        return [
            'datasets' => [
                // Data untuk pemeliharaan aset
                [
                    'label' => 'Asset Maintenance',
                    'data' => [10, 20, 15, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200, 210, 220, 230], // Contoh data jumlah pemeliharaan per bulan
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
                // Data untuk penggunaan aset
                [
                    'label' => 'Asset Usage',
                    'data' => [5, 15, 25, 35, 45, 55, 65, 75, 85, 95, 105, 115, 125, 135, 145, 155, 165, 175, 185, 195, 205, 215, 225, 235], // Contoh data jumlah penggunaan aset per bulan
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'fill' => true,
                ],
                // Data untuk transaksi produk
                [
                    'label' => 'Product Transactions',
                    'data' => [8, 18, 28, 38, 48, 58, 68, 78, 88, 98, 108, 118, 128, 138, 148, 158, 168, 178, 188, 198, 208, 218, 228, 238], // Data transaksi produk per bulan
                    'borderColor' => 'rgba(255, 159, 64, 1)',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => [
                'Jan 2023', 'Feb 2023', 'Mar 2023', 'Apr 2023', 'May 2023', 'Jun 2023', 'Jul 2023', 'Aug 2023', 'Sep 2023', 'Oct 2023', 'Nov 2023', 'Dec 2023',
                'Jan 2024', 'Feb 2024', 'Mar 2024', 'Apr 2024', 'May 2024', 'Jun 2024', 'Jul 2024', 'Aug 2024', 'Sep 2024', 'Oct 2024', 'Nov 2024', 'Dec 2024' // Label untuk bulan dalam dua tahun
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis chart adalah line chart
    }

    // Menambahkan pengaturan ukuran chart
    protected function getOptions(): array
    {
        return [
            'responsive' => true, // Responsif terhadap ukuran layar
            'maintainAspectRatio' => false, // Mengizinkan perubahan ukuran aspek chart
            'height' => 1000, // Menyesuaikan tinggi chart
            'width' => 1000, // Menyesuaikan lebar chart
        ];
    }
}
