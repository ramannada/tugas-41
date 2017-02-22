<?php
namespace App\Controller;

abstract class Base
{
    protected $url, $action, $model;
    protected $namespace = 'App\\Model\\';
    public $message;

    public function __construct($url, $action)
    {

        $this->action = $action;

        if (!empty($url['page'])) {
            $this->url = $url['page'];
            $model = $this->namespace . ucfirst($this->url);
            $this->model = new $model;
        }
        // else {
        //     $this->renderView("");
        // }
    }
    public function executeAction()
    {
        if (!empty($this->action)) {
            return $this->{$this->action}($_GET);
        } else {
            $this->message = "Action not found";
            return $this->message;
        }
    }
    public function renderView($viewModel)
    {
        if(empty($this->url)) {
            $viewName = 'home';
        } else {
            $viewName = $this->url;
        }

        $viewFile = "App/View/$viewName.php";
        if (file_exists($viewFile)) {
            $content = $viewFile;
            require_once dirname("App/Controller") . "/View/template.php";
        } else {
            $this->message = "File not found";
            return $this->message;

        }
        // $a =  $viewFile;
        // return $a;
        // require_once dirname("App/Controller") . "/View/template.php";
    }

}
?>
