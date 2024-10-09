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
use Illuminate\Contracts\View\View;
use App\Models\Book;
use App\Models\Category;

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
                ImageColumn::make('cover_image'),
                TextColumn::make('title'),
                TextColumn::make('category.name')
                ->label('Category'),
                TextColumn::make('description'),
                TextColumn::make('price'),
                TextColumn::make('seller'),
            ]);
    }
}
