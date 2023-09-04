<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
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

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Events';

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
                                            ->imageResizeTargetWidth(config('aisi.images.event.width'))
                                            ->imageResizeTargetHeight(config('aisi.images.event.height'))
                                            ->directory(config('aisi.images.event.path'))
                                            ->label('Image'),
                                        
                                        DatePicker::make('date')
                                            ->label('Date'),

                                        Select::make('event_type_id')
                                            ->relationship('type', 'name')
                                            ->label('Type'),

                                        Select::make('album_id')
                                            ->relationship('album', 'title')
                                            ->label('Album'),

                                        TextInput::make('name')
                                            ->required()
                                            ->label('Name'),
                                            
                                        TextInput::make('description')
                                            ->label('Description'),   
                                        
                                        TextInput::make('address')
                                            ->label('Address'),
                                        
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

                TextColumn::make('id')
                    ->label('ID'),
                
                TextColumn::make('name')
                    ->label('Name'),

                TextColumn::make('date')
                    ->label('Date'),

                TextColumn::make('type.name')
                    ->label('Type'),

                TextColumn::make('album.title')
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }    
}
