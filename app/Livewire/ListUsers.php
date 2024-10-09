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
use App\Models\User;
use Filament\Tables\Actions\Action;

class ListUsers extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.list-users');
    }

    public function table(Table $table): Table
    {
        $currentUser = auth()->user();
        return $table
            ->query(User::query()->with('roles')
                ->when($currentUser->name !== 'Superadmin', function($query){
                    return $query->where('name', '!=', 'Superadmin');
                })
            )
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('roles.name')
                ->label('Role'),
            ])
            ->actions([
                Action::make('edit')
                ->url(fn (User $record): string => route('users.edit', $record))
                ->color('warning')
                ,
                Action::make('delete')
                ->requiresConfirmation()
                ->action(fn (User $record) => $record->delete())
                ->color('danger')
                ,
            ])
            ;
    }
}
