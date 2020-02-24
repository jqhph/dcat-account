<?php

namespace App\Admin\Controllers;

use App\Models\Linkman;
use App\Models\Organization as OrganizationModel;
use App\Admin\Repositories\Organization;
use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\SimpleGrid;
use Dcat\Admin\Tree;

class OrganizationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return mixed
     */
    protected function grid()
    {
        return Tree::make(new Organization(), function (Tree $tree) {
            $tree->disableCreateButton();
            $tree->disableQuickEditButton();

            $tree->branch(function ($branch) {
                return $branch['name'];
            });
        });
    }

    /**
     * Make a simple-grid builder.
     *
     * @return SimpleGrid
     */
    protected function simpleGrid()
    {
        return SimpleGrid::make(new Organization(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->parent->get('name');
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->model()->with('parent');

            $grid->quickSearch(['id', 'name']);
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
            $form->select('parent_id')->options(function () {
                return OrganizationModel::selectOptions();
            });

            $form->text('name')->required();
            $form->text('order')
                ->type('number')
                ->default(10)
                ->help('值越小排序越靠前');

            $form->select('linkman_id')
                ->options(function () {
                    return Linkman::all()->pluck('name', 'id');
                })
                ->saving(function ($value) {
                    return (int) $value;
                });

            $form->tags('tag_id')->options(function () {
                return Tag::all()->pluck('name', 'id');
            });

            $form->textarea('description');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
