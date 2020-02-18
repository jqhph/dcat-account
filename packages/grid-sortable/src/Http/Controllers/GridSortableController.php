<?php

namespace Dcat\Admin\Extension\GridSortable\Http\Controllers;

use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class GridSortableController extends Controller
{
    public function sort(Request $request)
    {
        $column = $request->get('_column');
        $sorts  = $request->get('_sort');
        $sorts  = collect($sorts)
            ->pluck('key')
            ->combine(
                collect($sorts)->pluck('sort')->sort()
            );

        $status     = true;
        $message    = trans('admin.save_succeeded');
        $repository = $request->get('_model');

        try {
            $sorts->each(function ($v, $k) use ($repository, $column) {
                $form = new Form(new $repository);

                $form->text($column);

                $form->update($k, [$column => $v]);
            });

        } catch (\Exception $exception) {
            $status  = false;
            $message = $exception->getMessage();
        }

        return response()->json(compact('status', 'message'));

    }
}