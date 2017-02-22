<?php
namespace App\Controller;

use App\Controller\Base;

class User extends Base
{
    public function index()
    {
        $viewModel = $this->model->showAll();
        $this->renderView($viewModel);
        return $viewModel;
    }
    public function editPage($username)
    {
        if (!isset($username['username']) || empty($username['username'])) {
            $username = "";
        } else {
            $username = $username['username'];
        }
        $viewModel = $this->model->showByUsername($username);
        $this->renderView($viewModel);
        return $viewModel;
    }
    public function updateUser($user)
    {
        $viewModel = $this->model->updateUser($user);
        $this->renderView($viewModel);
        return $viewModel;
    }
}
?>
