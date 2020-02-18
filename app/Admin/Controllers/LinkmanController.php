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
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '联系人';

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
            $grid->mobile;
            $grid->gender;
            $grid->birthday;
            $grid->province_id;
            $grid->city_id;
            $grid->area_id;
            $grid->address;
            $grid->description;
            $grid->nickname;
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
