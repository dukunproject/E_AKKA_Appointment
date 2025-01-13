<?php

namespace App\Filament\Widgets;

use App\Models\Reservasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReservasiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Terjadwal', Reservasi::query()->where('status_reservasi', 'terjadwal')->where('tanggal_reservasi', '>=', now()->subDay())->count())
                ->description('Pasien Terjadwal Hari Ini')
                ->color('info'),
            Stat::make('Selesai', Reservasi::query()->where('status_reservasi', 'selesai')->where('tanggal_reservasi', '>=', now()->subDay())->count())
                ->description('Pasien Selesai Ditangani')
                ->color('success'),
            Stat::make('Batal', Reservasi::query()->where('status_reservasi', 'batal')->where('tanggal_reservasi', '>=', now()->subDay())->count())
                ->description('Reservasi Dibatalkan')
                ->color('danger'),
        ];
    }
}
