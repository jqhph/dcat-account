<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Cnarea;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class CnareaController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Cnarea(), function (Grid $grid) {
            $grid->id->bold()->sortable();
            $grid->level;
            $grid->code;
            $grid->parent_code;
            $grid->name;
            $grid->short_name;
            $grid->full_name;
            $grid->pinyin;
            $grid->area_code;
            $grid->post_code;
            $grid->lng;
            $grid->lat;

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
        return Show::make($id, new Cnarea(), function (Show $show) {
            $show->id;
            $show->level;
            $show->code;
            $show->divider();
            $show->parent_code;
            $show->name;
            $show->short_name;
            $show->full_name;
            $show->pinyin;
            $show->area_code;
            $show->post_code;
            $show->lng;
            $show->lat;
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
        return Form::make(new Cnarea(), function (Form $form) {
            $form->display('id');
            $form->text('level');
            $form->text('code');
            $form->text('parent_code');
            $form->text('name');
            $form->text('short_name');
            $form->text('full_name');
            $form->text('pinyin');
            $form->text('area_code');
            $form->text('post_code');
            $form->text('lng');
            $form->text('lat');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
