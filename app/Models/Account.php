<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use ModelTree, SoftDeletes;

    protected $titleColumn = 'name';

    public function user()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
