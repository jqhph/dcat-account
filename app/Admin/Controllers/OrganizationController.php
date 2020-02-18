<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Organization;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class OrganizationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '机构';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Organization(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->name;
            $grid->parent_id;
            $grid->description;
            $grid->order;
            $grid->linkman_id;
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
        return Show::make($id, new Organization(), function (Show $show) {
            $show->id;
            $show->name;
            $show->parent_id;
            $show->divider();
            $show->description;
            $show->order;
            $show->linkman_id;
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
        return Form::make(new Organization(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('parent_id');
            $form->text('description');
            $form->text('order');
            $form->text('linkman_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
