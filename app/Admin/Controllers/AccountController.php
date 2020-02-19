<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Account;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AccountController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Account(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->name;
            $grid->money;
            $grid->user_id;
            $grid->organization_id;
            $grid->parent_id;
            $grid->order;
            $grid->created_at;
            $grid->updated_at->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
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
        return Show::make($id, new Account(), function (Show $show) {
            $show->id;
            $show->name;
            $show->money;
            $show->divider();
            $show->user_id;
            $show->organization_id;
            $show->parent_id;
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
        return Form::make(new Account(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('money');
            $form->text('user_id');
            $form->text('organization_id');
            $form->text('parent_id');
            $form->text('order');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
