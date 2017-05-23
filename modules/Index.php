<?php

use Bunny\Http\Request;
use Bunny\Http\Response;
use Bunny\Http\Mvc\Controller;

use Example\Controller\UserController;

/**
 * 首页
 */
class Index extends Controller{

    /**
     * 首页具体实现
     */
    public function indexAction(){
        $controller = new UserController($this->request, $this->response);
        $controller->indexAction();
        //默认规则的方法是不设置视图的，但Index默认没有指定视图，所以需要设置
        $this->response->view('modules/Example/View/user/index.phtml');
    }
}