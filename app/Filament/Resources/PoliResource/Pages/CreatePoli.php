<?php

namespace App\Filament\Resources\PoliResource\Pages;

use App\Filament\Resources\PoliResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePoli extends CreateRecord
{
    protected static string $resource = PoliResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses.')
            ->body('Data poli berhasil ditambahkan');
    }
}
