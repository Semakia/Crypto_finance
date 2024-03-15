<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Level;

class LevelTable extends DataTableComponent
{

    public $paginationTheme = 'bootstrap-5';
    public string $primaryKey = 'id';
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';
    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'),'name')
                ->sortable(),
            Column::make(__('messages.common.level_price'),'level_price')
                ->sortable(),
            Column::make(__('messages.common.color'),'color')
                ->sortable(),
            Column::make(__('messages.common.action'))->addClass('w-150px text-center'),
        ];
    }

    public function query(): Builder
    {
        return Level::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.level_table';
    }

    public function resetPageTable($pageName = 'levels-table')
    {
        $this->customResetPage($pageName);
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'admin.levels.add-button',
            ]);
    }
}
