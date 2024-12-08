<?php

namespace App\Livewire;

use App\Models\Set;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class SetTable extends PowerGridComponent
{
    public string $tableName = 'set-table-1xeglj-table';

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
        return Set::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name', fn (Set $model) => '<a class="link" href="' . route('set', ['set_id' => $model->id]) . '">' . $model->name . '</a>')
            ->add('symbol', function ($image) {
                return '<img src="' . asset($image->logo) . '" width="32px" height="32px" alt="' . $image->name . '">';
            })
            ->add('logo', function ($image) {
                return '<img src="' . asset($image->logo) . '" width="64px" height="64px" alt="' . $image->name . '">';
            })
            ->add('release_date_formatted', fn (Set $model) => Carbon::parse($model->release_date)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Symbol', 'symbol'),

            Column::make('Logo', 'logo'),

            Column::make('Release date', 'release_date_formatted', 'release_date')
                ->sortable(),
        ];
    }
}
