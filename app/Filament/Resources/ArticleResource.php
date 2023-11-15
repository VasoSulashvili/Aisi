<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\User;
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

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Blog';

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
                                            ->imageResizeTargetWidth('1920')
                                            ->imageResizeTargetHeight('1080')
                                            ->label('Image'),

                                        Select::make('user_id')
                                            ->relationship('author', 'id')
                                            ->getOptionLabelFromRecordUsing(fn (User $record) => "{$record?->profile?->full_name}")
                                            ->label('Author'),

                                        TextInput::make('title')
                                            ->required()
                                            ->label('Title'),

                                        RichEditor::make('description')
                                            ->label('Description'),

                                        RichEditor::make('body')
                                            ->label('Body'),

                                        Checkbox::make('active')
                                            ->label('Active')

                                    ]),
                                Tabs\Tab::make('Tags')
                                    ->schema([

                                        // Repeater::make('tags')
                                        //     ->schema([

                                        //         TextInput::make('tag')
                                        //             ->label('Tag')

                                        // ])
                                        // ->columns(1),
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

                TextColumn::make('title')
                    ->label('Title'),

                TextColumn::make('url')
                    ->label('URL'),

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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
