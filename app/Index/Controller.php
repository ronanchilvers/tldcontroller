<?php

namespace app\Index;

class Controller extends \TLD\Controller
{

    protected $_layouts = array(
            'default',
            'page'
        );

    public function indexAction()
    {
        $this->view()->name = "Ronan";
    }

    public function aboutAction()
    {}

}