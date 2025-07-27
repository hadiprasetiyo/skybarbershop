<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataCollectionResource\Pages;
use App\Filament\Resources\DataCollectionResource\RelationManagers;
use App\Models\DataCollection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class DataCollectionResource extends Resource
{
    protected static ?string $model = DataCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_model')
                ->label('Nama Model')
                ->required()
                ->maxLength(45),

            Forms\Components\TextInput::make('harga')
                ->label('Harga')
                ->required()
                ->numeric()
                ->prefix('Rp'),

            Forms\Components\FileUpload::make('gambar')
                ->label('Gambar Model')
                ->image()
                ->directory('data-collection')
                ->imagePreviewHeight('200')
                ->maxSize(1024) // dalam KB
                ->disk('public')
                ->required()
                ->preserveFilenames()
            ]);
    }

    public static function table(Table $table): Table
    {
      return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama_model')
                ->label('Nama Model')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('harga')
                ->label('Harga')
                ->money('IDR', true)
                ->sortable(),
                
            Tables\Columns\ImageColumn::make('gambar')
                ->label('Gambar')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar))
                ->height(48) // Tinggi gambar tetap
                // ->width(48)
                ->alignLeft() // Rata kiri agar tidak terdorong ke kanan
                ->extraImgAttributes(['class' => 'w-12 h-12 rounded object-cover mx-auto',])
                ->disableClick(),
        ])
        ->filters([
            //
        ])
        ->actions([
          Tables\Actions\ViewAction::make(), // Optional: lihat detail
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
            'index' => Pages\ListDataCollections::route('/'),
            'create' => Pages\CreateDataCollection::route('/create'),
            'edit' => Pages\EditDataCollection::route('/{record}/edit'),
        ];
    }
}
