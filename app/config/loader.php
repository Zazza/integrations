<?php

$loader = new \Phalcon\Loader();

$loader
    ->registerNamespaces([
        'Controllers' => $config->application->controllersDir,
        'Integration' => $config->application->srcDir
    ])
    ->register();

require $config->application->vendorDir . 'autoload.php';
