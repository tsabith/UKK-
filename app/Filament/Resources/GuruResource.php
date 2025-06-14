<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\DB;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Guru'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->label('Nama'),
                TextInput::make('nip')
                    ->required()
                    ->label('NIP'),
                Forms\Components\Select::make('gender')->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ])->required(),
                TextInput::make('alamat')
                    ->label('Alamat'),
                TextInput::make('kontak')
                    ->label('Kontak'),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('gender')
                ->formatStateUsing(fn ($state) => DB::select("SELECT getGenderCode(?) AS gender", [$state])[0]->gender),
                Tables\Columns\TextColumn::make('kontak'),
                Tables\Columns\TextColumn::make('email'),
                
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
// This code defines a Filament resource for managing Guru (teacher) records in a web application.
// It includes form fields for creating and editing Guru records, a table for displaying them, and actions for editing and deleting records.
// The resource uses the Guru model and provides a user interface for managing teacher data, including