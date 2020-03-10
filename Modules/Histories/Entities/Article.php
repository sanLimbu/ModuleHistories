<?php

namespace Modules\Histories\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Histories\Traits\Historyable;

class Article extends Model
{
    use Historyable;
    protected $guarded = [];



}
