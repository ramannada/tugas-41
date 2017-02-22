<?php
namespace App\Controller;

use App\Controller\Base;

class About extends Base
{
    protected function index()
    {
        $viewModel = "";
        $this->renderView($viewModel);
    }
}
?>
