<?php

require('vendor/autoload.php');
require('config-app.php');
require('config-env.php');

$wireframe = $_REQUEST['wireframe'] ?? 'index';

$options = [
  'wireframesDir' => __DIR__ . '/wireframes',
  'isWindow' => (bool) ($_REQUEST['__IS_WINDOW__'] ?? false),
];

$loader = new \AdiosWireframe\Loader($options, $config, $_REQUEST);
echo $loader->render($wireframe);