<?php

namespace App\Livewire;

use App\Models\Card;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CardTable extends PowerGridComponent
{
    public string $tableName = 'card-table-ik4lfi-table';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Card::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name', fn (Card $model) => '<a class="link" href="' . route('card', ['card_id' => $model->id]) . '">' . $model->name . '</a>')
            ->add('image', function ($i) {
                return '<img src="' . asset($i->image) . '" width="128px" height="128px" alt="' . $i->name . '">';
            })
            ->add('reference')
            ->add('set_id', function (Card $model) {
                return '<a class="link" href="' . route('set', ['set_id' => $model->set->id]) . '">' . $model->set->name . '</a>';
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Image', 'image'),
            Column::make('Reference', 'reference')
                ->sortable()
                ->searchable(),

            Column::make('Set', 'set_id')
                ->sortable()
                ->searchable(),
        ];
    }
}
