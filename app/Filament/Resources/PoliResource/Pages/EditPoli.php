<?php

namespace App\Filament\Resources\PoliResource\Pages;

use App\Filament\Resources\PoliResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPoli extends EditRecord
{
    protected static string $resource = PoliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses.')
            ->body('Data poli berhasil diubah');
    }
}
