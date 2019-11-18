<?php

$router = new \Phalcon\Mvc\Router();

$router->addPost(
    '/integrations/addSubscriber',
    [
        'action' => 'add'
    ]
);

return $router;
