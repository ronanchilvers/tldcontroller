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
        $this->render('index');
    }

    public function aboutAction()
    {
        $this->render('about');
    }

    public function helloAction($name)
    {
        $this->render('hello', array(
                'name' => $name
            ));
    }
}