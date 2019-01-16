<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //数据表名
    public $table = 'order';
    //主键
    public $primaryKey = 'id';
}
