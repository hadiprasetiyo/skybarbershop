<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataCollection;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataCollectionResource\Pages;
use App\Filament\Resources\DataCollectionResource\RelationManagers;

class DataCollectionResource extends Resource
{
    protected static ?string $model = DataCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canAccess(): bool
    {
        return Auth::user()?->roles->pluck('name')->contains('admin');
    }

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
                ->imagePreviewHeight(200)
                ->maxSize(1024) // dalam KB
                ->disk('public') // menyimpan ke storage/app/public
                ->preserveFilenames()
                ->required(fn (string $context): bool => $context === 'create') // hanya wajib saat create
                ->nullable()
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
