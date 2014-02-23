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
        $this->render('index', array(
                'date' => date('Y-m-d')
            ));
    }

    public function helloAction($name)
    {
        $this->render('hello', array(
                'name' => $name
            ));
    }
}