<?php

namespace app\Api;

class Controller extends \TLD\Controller
{
    protected $_viewClass = '\TLD\View\Json';

    public function indexAction()
    {
        $this->render(200, array('Testing'));
    }
}