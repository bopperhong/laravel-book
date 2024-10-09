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
use App\Models\Category;
use Filament\Tables\Actions\Action;

class ListCategories extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.list-categories');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())
            ->columns([
                TextColumn::make('name'),
            ])
            ->actions([
                Action::make('edit')
                ->url(fn (Category $record): string => route('categories.edit', $record))
                ->color('warning'),
                Action::make('delete')
                ->requiresConfirmation()
                ->action(fn (Category $record) => $record->delete())
                ->color('danger'),
            ])
            ;
    }
}
