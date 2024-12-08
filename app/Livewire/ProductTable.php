<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ProductTable extends PowerGridComponent
{
    public string $tableName = 'product-table-0ite96-table';

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
        return Product::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name', fn (Product $model) => '<a class="link" href="' . route('product', ['product_id' => $model->id]) . '">' . $model->name . '</a>')
            ->add('image', function ($i) {
                return '<img src="' . asset($i->image) . '" width="256px" height="256px" alt="' . $i->name . '">';
            })
            ->add('release_date_formatted', fn (Product $model) => Carbon::parse($model->release_date)->format('d/m/Y'))
            ->add('product_type_id', function (Product $model) {
                return ProductType::find($model->product_type_id)->name;
            })
            ->add('set_id', fn (Product $model) => '<a class="link" href="' . route('set', ['set_id' => $model->set->id]) . '">' . $model->set->name . '</a>');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Image', 'image'),
            Column::make('Release date', 'release_date_formatted', 'release_date')
                ->sortable(),

            Column::make('Product type', 'product_type_id')
                ->sortable()
                ->searchable(),
            Column::make('Set', 'set_id')
                ->sortable()
                ->searchable(),
        ];
    }
}
