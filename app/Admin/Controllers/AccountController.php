<?php

namespace App\Admin\Controllers;

use App\Models\Account as AccountModel;
use App\Admin\Repositories\Account;
use App\Models\Organization;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Models\Administrator;
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
            $grid->name->valueAsFilter('=');
            $grid->money;
            $grid->user_id;
            $grid->organization_id;
            $grid->parent_id;
            $grid->order;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->quickSearch(['id', 'name']);

            $grid->quickCreate(function (Grid\Tools\QuickCreate $quickCreate) {
                $quickCreate->text('name')->required();
                $quickCreate->text('money')->type('number')->required();

                $quickCreate
                    ->select('organization_id')
                    ->options(
                        Organization::all()->pluck('name', 'id')
                    );
                $quickCreate
                    ->select('user_id')
                    ->default(Admin::user()->id)
                    ->options(
                        Administrator::all()->pluck('username', 'id')
                    );
                $quickCreate
                    ->select('parent_id')
                    ->options(
                        AccountModel::selectOptions()
                    );
            });
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

                $filter->scope('trashed')->onlyTrashed();
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
            $form->text('organization_id')->saving(function ($value) {
                return (int) $value;
            });
            $form->text('parent_id');
            $form->text('order');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
