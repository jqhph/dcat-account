<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\PaymentMethod;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class PaymentMethodController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PaymentMethod(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->name;
            $grid->created_at;
            $grid->updated_at->sortable();
        
            $grid->quickSearch(['id', 'name']);

            $grid->quickCreate(function (Grid\Tools\QuickCreate $quickCreate) {
                $quickCreate->text('name')->required();
            });

            $grid->disableFilterButton();
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
        return Show::make($id, new PaymentMethod(), function (Show $show) {
            $show->id;
            $show->name;
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
        return Form::make(new PaymentMethod(), function (Form $form) {
            $form->display('id');
            $form->text('name');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
