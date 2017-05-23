<?php

return array(
    '/api' => array(
        'className' => 'Example\\Controller\\HttpController',
        'methodName' => 'apiAction'),
    '/index' => array(
        'className' => 'Example\\Controller\\HttpController',
        'methodName' => 'indexAction',
        'viewName' => 'modules/Example/View/http/index.phtml')
);