<?php

namespace App\Filament\Resources\ReservasiResource\Pages;

use App\Filament\Resources\ReservasiResource;
use App\Models\Reservasi;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListReservasis extends ListRecords
{
    protected static string $resource = ReservasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make(),
            'Minggu Ini' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('tanggal_reservasi',  '>=', now()->subWeek()))
                ->badge(Reservasi::query()->where('tanggal_reservasi',  '>=', now()->subWeek())->count()),
            'Bulan Ini' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('tanggal_reservasi',  '>=', now()->subMonth()))
                ->badge(Reservasi::query()->where('tanggal_reservasi',  '>=', now()->subMonth())->count()),
            'Tahun Ini' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('tanggal_reservasi',  '>=', now()->subYear()))
                ->badge(Reservasi::query()->where('tanggal_reservasi',  '>=', now()->subYear())->count()),
        ];
    }
}
