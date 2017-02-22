<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Controller;
// $_GET['page'] = "user";

$kernel = new Router($_GET);
$controller = $kernel->getController();
$controller->executeAction();
// $controller->renderView();
// $controller->renderView($_GET['model']);
// $kernel->get();
// var_dump($controller->{$controller->action});
// echo $controller->renderView();
// var_dump($_GET['page']);
?>
