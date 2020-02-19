<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Linkman;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LinkmanController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Linkman(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->name;
            $grid->nickname;
            $grid->mobile;
            $grid->gender;
            $grid->birthday;
            $grid->province_id;
            $grid->city_id;
            $grid->district_id;
            $grid->address;
            $grid->description;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->quickCreate(function (Grid\Tools\QuickCreate $quickCreate) {
                $quickCreate->text('name')->required();
                $quickCreate->text('nickname');
                $quickCreate->text('mobile');
                $quickCreate->select('gender')->options(admin_trans('linkman.options'));
                $quickCreate->date('birthday');
                $quickCreate->text('description');
            });

            $grid->quickSearch(['id', 'name', 'nickname', 'mobile']);
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->in('gender')->checkbox(admin_trans('linkman.options'));
                $filter->like('name');
                $filter->like('nickname');
                $filter->like('mobile');
                $filter->equal('birthday');
                $filter->between('created_at');
                $filter->between('updated_at');

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
        return Show::make($id, new Linkman(), function (Show $show) {
            $show->id;
            $show->name;
            $show->mobile;
            $show->divider();
            $show->gender;
            $show->birthday;
            $show->province_id;
            $show->city_id;
            $show->area_id;
            $show->address;
            $show->description;
            $show->nickname;
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
        return Form::make(new Linkman(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('mobile');
            $form->text('gender');
            $form->text('birthday');
            $form->text('province_id');
            $form->text('city_id');
            $form->text('area_id');
            $form->text('address');
            $form->text('description');
            $form->text('nickname');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
