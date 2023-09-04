<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AwardResource\Pages;
use App\Filament\Resources\AwardResource\RelationManagers;
use App\Models\Award;
use App\Models\Dancer;
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

class AwardResource extends Resource
{
    protected static ?string $model = Award::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Business Model';

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

                                TextInput::make('title')
                                    ->required()
                                    ->label('Title'),
                                    
                                TextInput::make('description')
                                    ->label('Description'),                                    
                                
                                Checkbox::make('active')
                                    ->label('Active'),
                            ]),
                            Tabs\Tab::make('Relations')
                                ->schema([
                                    
                                    Select::make('event_id')
                                        ->relationship('event', 'name')
                                        ->label('Event'),

                                    Select::make('dancers')
                                        ->relationship('dancers', 'surname')
                                        ->multiple()
                                        ->getOptionLabelFromRecordUsing(fn (Dancer $record) => "{$record->full_name_group_name}")
                                        ->label('Dancer'),

                                    
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

                TextColumn::make('id')
                    ->label('ID'),
            
                TextColumn::make('title')
                    ->label('Title'),

                TextColumn::make('event.name')
                    ->label('Album'),

                CheckboxColumn::make('active')
                    ->label('Active'),
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
            'index' => Pages\ListAwards::route('/'),
            'create' => Pages\CreateAward::route('/create'),
            'edit' => Pages\EditAward::route('/{record}/edit'),
        ];
    }    
}
