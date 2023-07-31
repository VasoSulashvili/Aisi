<?php

namespace App\Filament\Resources\DancerResource\Pages;

use App\Filament\Resources\DancerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDancers extends ListRecords
{
    protected static string $resource = DancerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
