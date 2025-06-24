<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanResource\Pages;
use App\Filament\ResourcesPesanResource\RelationManagers;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_barang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nama_pesan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('harga_pesan')
                    ->required()
                    ->columnSpanFull(),
                //Forms\Components\TextInput::make('gambar')
                //    ->required()
                //    ->maxLength(255),
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->imageEditor(),
                //Forms\Components\Textarea::make('lampiran')
                //    ->required()
                //    ->columnSpanFull(),
                Forms\Components\FileUpload::make('lampiran')
                    ->multiple()
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->storeFileNamesIn('lampiran_nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_barang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_pesan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPesan::route('/'),
            'create' => Pages\CreatePesan::route('/create'),
            'edit' => Pages\EditPesan::route('/{record}/edit'),
        ];
    }
}