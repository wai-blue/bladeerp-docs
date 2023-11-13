<?php

require('vendor/autoload.php');
require('config.php');

$wireframe = $_REQUEST['wireframe'] ?? 'index';

$options = [
  'wireframesDir' => __DIR__ . '/wireframes',
  'isWindow' => (bool) ($_REQUEST['__IS_WINDOW__'] ?? false),
];

$loader = new \AdiosWireframe\Loader($options, $config);
echo $loader->render($wireframe);