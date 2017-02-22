<?php
namespace App\Controller;

use App\Controller\Base;

class Home extends Base
{
    public function index()
    {
        $viewModel = "";
        $this->renderView($viewModel);
    }
}
?>
