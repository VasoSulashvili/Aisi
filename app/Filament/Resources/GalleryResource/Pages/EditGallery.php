<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function() {

                    $path = storage_path('app/public/' . current($this->data['image']));

                    unlink($path);
                })
            ,
        ];
    }
}
