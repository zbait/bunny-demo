<?php

return array(
    '/' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'index',
        'viewName' => 'template/user/index.html'
    ),
    '/user' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'index',
        'viewName' => 'template/user/index.html'
    ),
    '/user/query' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'query'
    ),
    '/user/save' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'save'
    ),
    '/user/delete' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'delete'
    ),
    '/user/edit' => array(
        'className' => 'User\\IndexController',
        'methodName' => 'edit',
        'viewName' => 'template/user/edit.html'
    )
);