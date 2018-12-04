<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Info extends Model
{
    //数据表名
    public $table = 'infos';
    //主键
    public $primaryKey = 'id';
    //时间戳
    public $timestamps = true;
    //设置时间格式为UNIX的时间格式
    protected $dateFormat = 'U';

    //设置白名单
    protected $fillable = ['title','content','id','author'];
}
