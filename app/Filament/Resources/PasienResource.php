<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Pasien';

    protected static ?string $modelLabel = 'Master Pasien';

    protected static ?string $pluralModelLabel = 'Master Pasien';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $slug = 'master-pasien';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pasien')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Pasien'),
                Forms\Components\TextInput::make('nomor_identitas')
                    ->required()
                    ->maxLength(255)
                    ->label('Nomor Identitas'),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->required()
                    ->maxLength(255)
                    ->label('Nomor Telepon'),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255)
                    ->label('Alamat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pasien')
                    ->searchable()
                    ->label('Nama Pasien'),
                Tables\Columns\TextColumn::make('nomor_identitas')
                    ->searchable()
                    ->label('Nomor Identitas'),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->searchable()
                    ->label('Nomor Telepon'),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->label('Alamat'),
                Tables\Columns\TextColumn::make('reservasis_count')->counts('reservasis')
                    ->label('Reservasi')
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
                Section::make('Detail Pasien')
                    ->schema([
                        TextEntry::make('nama_pasien')->label('Nama'),
                        TextEntry::make('nomor_identitas')->label('Nomor Identitas'),
                        TextEntry::make('nomor_telepon')->label('Nomor Telepon'),
                        TextEntry::make('alamat'),
                        TextEntry::make('reservasis_count')
                            ->state(function (Model $record): int {
                                return $record->reservasis->count();
                            })->label('Reservasi')
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
            'index' => Pages\ListPasiens::route('/'),
            // 'create' => Pages\CreatePasien::route('/create'),
            // 'view' => Pages\ViewPasien::route('/{record}'),
            // 'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }
}
