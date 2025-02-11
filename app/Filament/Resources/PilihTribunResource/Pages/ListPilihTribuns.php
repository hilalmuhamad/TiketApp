<?php

namespace App\Filament\Resources\PilihTribunResource\Pages;

use App\Filament\Resources\PilihTribunResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPilihTribuns extends ListRecords
{
    protected static string $resource = PilihTribunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
