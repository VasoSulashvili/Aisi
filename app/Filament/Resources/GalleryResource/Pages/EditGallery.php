<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Exception;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function() {

                    DB::table('imageables')->where('image_id', $this->data['id'])->delete();

                    $path = storage_path('app/public/' . current($this->data['image']));

                    unlink($path);
                    
                })
            ,
        ];
    }
}
