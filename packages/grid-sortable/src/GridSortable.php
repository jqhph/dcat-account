<?php

namespace Dcat\Admin\Extension\GridSortable;

use Dcat\Admin\Extension;
use Dcat\Admin\Grid;
use Dcat\Admin\Repositories\EloquentRepository;
use Spatie\EloquentSortable\Sortable;

class GridSortable extends Extension
{
    const NAME = 'grid-sortable';

    protected $serviceProvider = GridSortableServiceProvider::class;

    protected $assets = __DIR__.'/../resources/assets';

    protected $composerJson = __DIR__.'/../composer.json';

    protected $column = '__sortable__';

    public function boot()
    {
        $column = $this->column;

        Grid::macro('sortable', function ($sortName = 'order') use ($column) {
            /* @var $this Grid */
            $this->tools(new SaveOrderButton($sortName));

            if (!request()->has($sortName)) {
                $this->model()->ordered();
            }

            $this->column($column, ' ')
                ->displayUsing(SortableDisplay::class, [$sortName]);
        });
    }
}
