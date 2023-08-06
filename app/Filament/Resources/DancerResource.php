<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DancerResource\Pages;
use App\Filament\Resources\DancerResource\RelationManagers;
use App\Models\Dancer;
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

class DancerResource extends Resource
{
    protected static ?string $model = Dancer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

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
                                        ->imageCropAspectRatio('1:1')
                                        ->imageResizeTargetWidth('500')
                                        ->imageResizeTargetHeight('500')
                                        ->label('Image'),

                                    Select::make('group_id')
                                        ->relationship('group', 'name')
                                        ->label('Group'),

                                    TextInput::make('name')
                                        ->required()
                                        ->label('Name'),
                                        
                                    TextInput::make('surname')
                                        ->required()
                                        ->label('Surname'),

                                    DatePicker::make('birth_date')
                                        ->label('Birth Date'),

                                    RichEditor::make('biography')
                                        ->label('Biography'),

                                    
                                    
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

                TextColumn::make('name')
                    ->label('Name'),

                TextColumn::make('surname')
                    ->label('Surname'),

                TextColumn::make('birth_date')
                    ->label('Birth Date'),
                
                TextColumn::make('group.name')
                    ->label('Group'),

                TextColumn::make('branch.name')
                    ->label('Branch'),
                
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
            'index' => Pages\ListDancers::route('/'),
            'create' => Pages\CreateDancer::route('/create'),
            'edit' => Pages\EditDancer::route('/{record}/edit'),
        ];
    }    
}
