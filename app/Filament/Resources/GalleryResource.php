<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $navigationGroup = 'Media';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Tabs::make('Heading')
                        ->tabs([
                            Tabs\Tab::make('General')
                                ->schema([
                                        
                                    FileUpload::make('image')
                                        ->image()
                                        ->imageResizeMode('cover')
                                        ->imageResizeTargetWidth(config('aisi.images.gallery.width'))
                                        ->imageResizeTargetHeight(config('aisi.images.gallery.height'))
                                        ->directory(config('aisi.images.gallery.path'))
                                        ->label('Image'),

                                    Select::make('album_id')
                                        ->relationship('album', 'title')
                                        ->label('Album'),

                                    TextInput::make('title')
                                        ->required()
                                        ->label('Title'),
                                        
                                    TextInput::make('description')
                                        ->required()
                                        ->label('Description'),                                    
                                    
                                    Checkbox::make('active')
                                        ->label('Active'),
                                ]),

                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
                    TextColumn::make('image_path')
                    ->label('ID'),

                TextColumn::make('id')
                    ->label('ID'),
            
                TextColumn::make('title')
                    ->label('Title'),

                TextColumn::make('album.title')
                    ->label('Album')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }    
}
