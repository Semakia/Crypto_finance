<?php

namespace App\Http\Livewire;

use App\Models\FrontSlider2;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SecondSliderTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    public string $primaryKey = 'second-slider_id';

    protected string $pageName = 'second-slider-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.image')),
            Column::make(__('messages.slider.title_1'), 'title_1')
                ->sortable()->searchable(),
            Column::make(__('messages.slider.title_2'), 'title_2')
                ->sortable()->searchable()->addClass('justify-content-center d-flex'),
            Column::make('Action')->addClass('w-100px text-center'),
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return FrontSlider2::select('second_sliders.*');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'livewire-tables.rows.second_slider_table';
    }

    /**
     * @return Application|Factory|View
     */
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
                'componentName' => 'admin.front-cms2.sliders.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'second-slider-table')
    {
        $this->customResetPage($pageName);
    }
}