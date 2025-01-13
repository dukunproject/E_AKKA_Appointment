<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokterResource\Pages;
use App\Filament\Resources\DokterResource\RelationManagers;
use App\Models\Dokter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DokterResource extends Resource
{
    protected static ?string $model = Dokter::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Dokter';

    protected static ?string $modelLabel = 'Master Dokter';

    protected static ?string $pluralModelLabel = 'Master Dokter';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $slug = 'master-dokter';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_dokter')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Dokter'),
                Forms\Components\Select::make('poli_id')
                    ->relationship(name: 'poli', titleAttribute: 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Poli'),
                Forms\Components\Section::make('Jadwal Praktek')
                    ->description('Masukkan Detail Jadwal')
                    ->schema([
                        Forms\Components\TimePicker::make('jadwal_mulai')
                            ->native(false)
                            ->required()
                            ->label('Jadwal Mulai'),
                        Forms\Components\TimePicker::make('jadwal_selesai')
                            ->native(false)
                            ->required()
                            ->label('Jadwal Selesai'),
                        Forms\Components\Select::make('hari_libur')
                            ->options([
                                'senin' => "Senin",
                                'selasa' => "Selasa",
                                'rabu' => 'Rabu',
                                'kamis' => 'Kamis',
                                'jumat' => 'Jumat',
                                'sabtu' => 'Sabtu',
                                'minggu' => 'Minggu'
                            ])
                            ->native(false)
                            // ->multiple()
                            ->required()
                            ->label('Hari Libur'),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('poli.nama')
                    ->label('Nama Poli')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_dokter')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Dokter'),
                // Tables\Columns\TextColumn::make('jadwal_mulai')
                //     ->label('Mulai'),
                // Tables\Columns\TextColumn::make('jadwal_selesai')
                //     ->label('Selesai'),
                // Tables\Columns\TextColumn::make('hari_libur')
                //     ->searchable()
                //     ->label('Libur'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('poli.nama')
            ->filters([
                SelectFilter::make('Poli')
                    ->relationship('poli', 'nama')
                    ->searchable()
                    ->native(false)
                    ->preload()
                    ->label('Batasi Poli')
                    ->indicator('Nama Poli')
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detail Dokter')
                    ->schema([
                        TextEntry::make('nama_dokter'),
                        TextEntry::make('poli.nama')
                    ])->columns(2),
                Section::make('Jadwal Praktek')
                    ->schema([
                        TextEntry::make('jadwal_mulai')->label('Mulai'),
                        TextEntry::make('jadwal_selesai')->label('Selesai'),
                        TextEntry::make('hari_libur')->label('Hari Libur')
                    ])->columns(3)
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
            'index' => Pages\ListDokters::route('/'),
            // 'create' => Pages\CreateDokter::route('/create'),
            // 'view' => Pages\ViewDokter::route('/{record}'),
            // 'edit' => Pages\EditDokter::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
