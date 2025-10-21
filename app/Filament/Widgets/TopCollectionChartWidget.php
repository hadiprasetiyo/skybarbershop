<?php

namespace App\Filament\Widgets;

use App\Models\DataBooking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopCollectionChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Model Potongan Terfavorit Berdasarkan Jumlah Booking';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Ambil top 10 collection berdasarkan jumlah booking
        $topCollections = DataBooking::select('data_collection_id', DB::raw('COUNT(*) as total'))
            ->groupBy('data_collection_id')
            ->orderByDesc('total')
            ->take(10)
            ->with('collection:id,nama_model')
            ->get();

        // Ambil label (nama model) dan total booking
        $labels = $topCollections->map(fn ($item) => optional($item->collection)->nama_model ?? 'Tidak diketahui')->toArray();
        $totals = $topCollections->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Booking',
                    'data' => $totals,
                    'backgroundColor' => [
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(239, 68, 68, 0.7)',
                        'rgba(139, 92, 246, 0.7)',
                        'rgba(236, 72, 153, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(2, 132, 199, 0.7)',
                        'rgba(250, 204, 21, 0.7)',
                        'rgba(107, 114, 128, 0.7)',
                    ],
                    'borderColor' => '#3b82f6',
                    'borderWidth' => 2,
                    'borderRadius' => 6,
                    'barThickness' => 24,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => ['display' => false],
                'tooltip' => [
                    'backgroundColor' => 'rgba(0,0,0,0.8)',
                    'titleColor' => '#fff',
                    'bodyColor' => '#fff',
                    'cornerRadius' => 6,
                ],
            ],
            'scales' => [
                'x' => [
                    'grid' => ['display' => false],
                    'ticks' => [
                        'font' => ['size' => 12, 'weight' => '500'],
                        'color' => '#6b7280',
                    ],
                    'categoryPercentage' => 1, // nilai kecil = jarak antar bar lebih lebar
                    'barPercentage' => 0.8, // nilai kecil = bar lebih tipis
                ],
                'y' => [
                    'beginAtZero' => true,
                    'grid' => ['color' => 'rgba(156, 163, 175, 0.1)'],
                    'ticks' => [
                        'font' => ['size' => 12, 'weight' => '500'],
                        'color' => '#6b7280',
                    ],
                ],
            ],
        ];
    }
}
