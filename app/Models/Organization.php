<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes, ModelTree;

    protected $titleColumn = 'name';
}
