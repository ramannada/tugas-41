<?php
namespace App;

use App\Controller;

class Router
{
    private $controller, $action, $url;
    private $controller_namespace = "App\\Controller\\";
    private $base_controller_name = "App\\Controller\\Base";

    public function __construct($get)
    {
        $this->url = $get;

        if (empty($this->url['page'])) {
            $this->controller = $this->controller_namespace . "Home";
        } else {
            $this->controller = $this->controller_namespace .
                                ucfirst($this->url['page']);
        }

        if (empty($this->url['action'])) {
            $this->action = 'index';
        } else {
            $this->action = lcfirst(ucwords($this->url['action']));
        }
    }

    public function getController()
    {
        if (class_exists($this->controller)) {
            $parent = class_parents($this->controller);

            if (in_array($this->base_controller_name, $parent)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->url, $this->action);
                } else {
                    echo "method not found";
                }
            } else {
                echo "controller not found";
            }
        } else {
            echo "class not found";
        }
    }
    // public function get()
    // {
    //     var_dump($this->controller);
    // }
}
?>
