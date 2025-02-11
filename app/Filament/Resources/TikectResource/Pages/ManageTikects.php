<?php

namespace App\Filament\Resources\TikectResource\Pages;

use App\Filament\Resources\TikectResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTikects extends ManageRecords
{
    protected static string $resource = TikectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
