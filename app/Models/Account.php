<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use ModelTree;

    protected $titleColumn = 'name';
}
