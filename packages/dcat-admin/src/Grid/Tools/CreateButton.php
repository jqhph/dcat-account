<?php

namespace Dcat\Admin\Grid\Tools;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Illuminate\Contracts\Support\Renderable;

class CreateButton implements Renderable
{
    /**
     * @var Grid
     */
    protected $grid;

    protected $mode;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
        $this->mode = $grid->option('create_mode');
    }

    protected function renderDialogCreateButton()
    {
        if ($this->mode !== Grid::CREATE_MODE_DIALOG) {
            return;
        }

        $new = trans('admin.new');
        $url = $this->grid->createUrl();
        $gridName = $this->grid->getName();
        $class = 'dialog-create'.($gridName ? "-{$gridName}" : $gridName);

        [$width, $height] = $this->grid->option('dialog_form_area');

        Form::modal($new)
            ->click(".{$class}")
            ->success('LA.reload()')
            ->dimensions($width, $height)
            ->render();

        return "<a data-url='$url' class='btn btn-sm btn-success {$class}'><i class='fa fa-plus'></i><span class='hidden-xs'>&nbsp; $new</span></a>";
    }

    protected function renderCreateButton()
    {
        if ($this->mode && $this->mode !== Grid::CREATE_MODE_DEFAULT) {
            return;
        }

        $new = trans('admin.new');
        $url = $this->grid->createUrl();

        return "<a href='{$url}' class='btn btn-sm btn-success btn-mini'>
    <i class='fa fa-plus'></i><span class='hidden-xs'>&nbsp;&nbsp;{$new}</span>
</a>";
    }

    public function render()
    {
        return "<div class='btn-group' style='margin-right:3px'>{$this->renderCreateButton()}{$this->renderDialogCreateButton()}</div>";
    }
}
