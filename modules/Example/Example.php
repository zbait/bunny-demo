<?php

namespace Example;

use Bunny\Framework\Http\Controller;

//LaravelDao
use Example\UserModel;
use Bunny\Database\LaravelDao;

class UserController extends Controller{

    /**
     * LaravelDao使用示例
     */
    public function model(){
        //初始化一次即可
        LaravelDao::create();
        //使用模型对象
        $user = new User();
        $users = User::all();
        $users = User::find(1);
        $user->username = 'zbait';
        $user->id = 'test_id_001';
        $user->save();
        $this->response->msg(200, $users->username);
    }

}