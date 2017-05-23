<?php

namespace Example\Controller;

use Bunny\Http\Mvc\Controller;
use Bunny\Database\PdoDao;
use Bunny\Database\PageUtil;

//LaravelDao
use Example\Model\User;
use Bunny\Database\LaravelDao;

class UserController extends Controller{

    /**
     * @var Bunny\Database\PdoDao 数据访问类
     */
    private $dao;

    private function dao(){
        if(empty($this->dao)){
            $this->dao = PdoDao::create('user_bunny');
        }
        return $this->dao;
    }

    // ===================  PAGE  ==========================

    public function indexAction(){
        $this->response->addData('name','haha');
    }

    public function editAction(){}

    // ===================  API  ==========================

    /**
     * 保存，修改API
     */
    public function saveAction(){
        $user = array();
        $user['id'] = $this->request->getParam('id');
        $user['username'] = $this->request->getParam('username');
        $user['password'] = $this->request->getParam('password');
        $user['mail'] = $this->request->getParam('mail');
        $user['tel'] = $this->request->getParam('tel');
        if(empty($user['id'])){
            $id = $this->dao()->insertById($user);
            $this->response->msg(200, $id);
        }else{
            $rowCount = $this->dao()->updateById($user);
            $this->response->msg(200, $rowCount);
        }
    }
    /**
     * 查找API
     */
    public function queryAction(){
        $id = $this->request->getParam('id');
        if(empty($id)){
            //分页信息
            $recordNum = 1;
            $pageNum = 5;
            $currentPageNum = $this->request->getParam('page');
            if(empty($currentPageNum)){
                $currentPageNum = 1;
            }
            $totalNum = $this->dao()->count();
            $this->response->addData('page',PageUtil::getPageInfo($recordNum, $pageNum, $currentPageNum, $totalNum));
            //分页记录
            $users = $this->dao()->fetch(array(), (($currentPageNum-1)*$recordNum), $recordNum);
            $this->response->api()->addData('users', $users);
        }else{
            $user = $this->dao()->fetchById($id);
            $this->response->api()->addData('user', $user);
        }
    }

    /**
     * 删除API
     */
    public function deleteAction(){
        $id = $this->request->getParam('id');
        $rowCount = $this->dao()->deleteById($id);
        $this->response->msg(200, 'row count is '.$rowCount);
    }

    /**
     * LaravelDao使用示例
     */
    public function modelAction(){
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