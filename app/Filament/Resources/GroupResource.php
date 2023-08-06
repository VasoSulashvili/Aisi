<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Filament\Resources\GroupResource\RelationManagers;
use App\Models\Group;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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

                                    Select::make('branch_id')
                                        ->relationship('branch', 'name')
                                        ->label('Branch'),

                                    TextInput::make('name')
                                        ->required()
                                        ->label('Name'),

                                    RichEditor::make('description')
                                        ->label('Description'),
                                                                                    
                                    Checkbox::make('active')
                                        ->label('Active')
                                ]),
                            Tabs\Tab::make('Schedule')
                                ->schema([
                                    Repeater::make('schedule')
                                        ->schema([
                                            Select::make('day')
                                                ->options([
                                                    'monday' => 'Monday',
                                                    'tuesday' => 'Tuesdaty',
                                                    'wednesday' => 'Wednesday',
                                                    'thursday' => 'Thursday',
                                                    'friday' => 'Friday',
                                                    'suturday' => 'Sutarday',
                                                    'sunday' => 'Sunday',
                                                ])
                                                ->label('Week Day'),

                                            TimePicker::make('schedule_time_from')
                                                ->label('From Time'),

                                            TimePicker::make('schedule_time_to')
                                                ->label('To Time'),

                                    ])
                                    ->columns(3),
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

                TextColumn::make('branch.name')
                    ->label('Branch'),

                CheckboxColumn::make('active')
                    ->label('Active')
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }    
}
