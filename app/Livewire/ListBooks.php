<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Contracts\View\View;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ListBooks extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.list-books');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Book::with('category'))
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover_image')
                ->collection('cover_images')
                ->label('Cover Image')
                ->square()
                ->visibility('public')
                ,
                TextColumn::make('title'),
                TextColumn::make('category.name')
                ->label('Category'),
                TextColumn::make('description'),
                TextColumn::make('price'),
                TextColumn::make('seller'),
            ]);
    }
}
