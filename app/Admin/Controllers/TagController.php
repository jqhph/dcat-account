<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class TagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '标签';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Tag(), function (Grid $grid) {
            $grid->sortable();

            $grid->order->orderable();
            $grid->id->bold();
            $grid->name;
            $grid->description;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->disableCreateButton();

            $grid->quickSearch(['id', 'name']);

            $grid->quickCreate(function (Grid\Tools\QuickCreate $quickCreate) {
                $quickCreate->text('name')->required();
                $quickCreate->text('description');
            });
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->between('created_at');
                $filter->between('updated_at');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Tag(), function (Show $show) {
            $show->id;
            $show->name;
            $show->description;
            $show->divider();
            $show->order;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Tag(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('description');
            $form->text('order');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
