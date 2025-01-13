<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservasiResource\Pages;
use App\Filament\Resources\ReservasiResource\RelationManagers;
use App\Models\Reservasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Reservasi';

    protected static ?string $modelLabel = 'Data Reservasi';

    protected static ?string $pluralModelLabel = 'Data Reservasi';

    protected static ?string $slug = 'data-reservasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pasien_id')
                    ->relationship(name: 'pasien', titleAttribute: 'nama_pasien')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Nama Pasien'),
                Forms\Components\Select::make('dokter_id')
                    ->relationship(name: 'dokter', titleAttribute: 'nama_dokter')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Nama Dokter'),
                Forms\Components\DatePicker::make('tanggal_reservasi')
                    ->displayFormat('d-m-Y')
                    ->native(false)
                    ->required()
                    ->label('Tanggal Reservasi'),
                Forms\Components\Select::make('status_reservasi')
                    ->options([
                        'terjadwal' => 'Terjadwal',
                        'hadir' => 'Hadir',
                        'batal' => 'Batal',
                        'selesai' => 'Selesai'
                    ])
                    ->native(false)
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_reservasi')
                    ->date('d-m-Y')
                    ->sortable()
                    ->label('Tanggal Reservasi'),
                Tables\Columns\TextColumn::make('pasien.nama_pasien')
                    ->label('Nama Pasien')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama Pasien'),
                Tables\Columns\TextColumn::make('dokter.nama_dokter')
                    ->label('Nama Dokter')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('Nama Dokter'),
                Tables\Columns\TextColumn::make('status_reservasi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'terjadwal' => 'info',
                        'hadir' => 'warning',
                        'batal' => 'danger',
                        'selesai' => 'success'
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'terjadwal' => 'heroicon-m-information-circle',
                        'hadir' => 'heroicon-m-clock',
                        'batal' => 'heroicon-m-x-circle',
                        'selesai' => 'heroicon-m-check-circle'
                    })
                    ->searchable()
                    ->label('Status'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('tanggal_reservasi', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'terjadwal' => 'Terjadwal',
                        'hadir' => 'Hadir',
                        'batal' => 'Batal',
                        'selesai' => 'Selesai'
                    ])
                    ->attribute('status_reservasi')
                    ->native(false)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservasis::route('/'),
            // 'create' => Pages\CreateReservasi::route('/create'),
            // 'view' => Pages\ViewReservasi::route('/{record}'),
            //'edit' => Pages\EditReservasi::route('/{record}/edit'),
        ];
    }
}
