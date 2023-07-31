<?php

namespace App\Filament\Resources\DancerResource\Pages;

use App\Filament\Resources\DancerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDancer extends EditRecord
{
    protected static string $resource = DancerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
