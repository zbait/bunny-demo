<?php

namespace Example\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    //设置映射表和主键
    protected $table = 'user_bunny';
	protected $primaryKey = "id";

    //关闭自动更新时间
    //public $timestamps = false;

    //重定义时间字段
	const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
}