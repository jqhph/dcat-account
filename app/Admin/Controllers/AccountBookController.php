<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AccountBook;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AccountBookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '账簿';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AccountBook(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->user_id;
            $grid->money;
            $grid->category_id;
            $grid->description;
            $grid->organization;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->quickCreate(function (Grid\Tools\QuickCreate $quickCreate) {
                $quickCreate
                    ->text('money')
                    ->type('number')
                    ->required();

                $quickCreate->text('description');

                $quickCreate->tags('tag_id')->options([]);

                $quickCreate->select('category_id')->options([]);
                $quickCreate->select('organization_id')->options([]);
                $quickCreate
                    ->select('user_id')
                    ->default(Admin::user()->id)
                    ->options(
                        Administrator::all()->pluck('username', 'id')
                    );
            });
        
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
        return Show::make($id, new AccountBook(), function (Show $show) {
            $show->id;
            $show->user_id;
            $show->money;
            $show->divider();
            $show->organization;
            $show->category_id;
            $show->description;
            $show->target_id;
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
        return Form::make(new AccountBook(), function (Form $form) {
            $form->display('id');
            $form->selectResource('user_id')->path('auth/users');
            $form->text('money');
            $form->text('type');
            $form->text('category_id');
            $form->text('description');
            $form->text('target_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
