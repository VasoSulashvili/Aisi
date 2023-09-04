<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'User';

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

                                        TextInput::make('name')
                                            ->label('Name'),

                                        TextInput::make('email')
                                            ->email()
                                            ->label('Email'),

                                        TextInput::make('password')
                                            ->password()
                                            ->label('Password'),

                                        TextInput::make('password_confirmation')
                                            ->password()
                                            ->label('Password Confirm'),

                                        Checkbox::make('active')
                                            ->label('Active')
                                    ]),
                                Tabs\Tab::make('Profile')
                                    ->schema([
                                        Fieldset::make('profile')
                                        ->columns(1)
                                            ->relationship('profile')
                                            ->schema([

                                                FileUpload::make('image')
                                                    ->image()
                                                    ->imageResizeMode('cover')
                                                    ->imageCropAspectRatio('1:1')
                                                    ->imageResizeTargetWidth('600')
                                                    ->imageResizeTargetHeight('600')
                                                    ->label('Image'),
    
                                                TextInput::make('name')
                                                    ->label('Name'),
        
                                                TextInput::make('surname')
                                                    ->label('Surname'),
        
                                                RichEditor::make('biography')
                                                    ->label('Biography')
                                                ])
                                        
                                    ]),
                                Tabs\Tab::make('Roles')
                                    ->schema([

                                        Select::make('roles')
                                            ->multiple()
                                            ->relationship('roles', 'name')
                                            ->label('Role')

                                    ]),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                TextColumn::make('email'),

                TextColumn::make('profile.name')
                    ->label('Name'),

                TextColumn::make('profile.surname')
                    ->label('Surname'),

                TextColumn::make('roles.name'),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
