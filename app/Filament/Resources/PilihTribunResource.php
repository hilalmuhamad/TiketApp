<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PilihTribunResource\Pages;
use App\Models\PilihTribun;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PilihTribunResource extends Resource
{
    protected static ?string $model = PilihTribun::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket'; // Correct icon nameh

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_tribun')
                ->label('Nama Tribun')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('harga')
                ->label('Harga')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('tempat_penukaran')
                ->label('Tempat Penukaran')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('stok')
                ->label('Stok Tiket')
                ->required()
                ->numeric()
                ->default(100),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nama_tribun')->label('Nama Tribun')->sortable(),
            TextColumn::make('tempat_penukaran')->label('Tempat Penukaran')->sortable(),
            TextColumn::make('harga')->label('Harga')->sortable()->money('IDR'),
            TextColumn::make('stok')->label('Stok Tersedia')->sortable(),
        ])->defaultSort('nama_tribun');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPilihTribuns::route('/'),
            'create' => Pages\CreatePilihTribun::route('/create'),
            'edit' => Pages\EditPilihTribun::route('/{record}/edit'),
        ];
    }
}
