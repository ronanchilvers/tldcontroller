<?php

namespace app\Hello;

class Controller extends \TLD\Controller
{

    protected $_viewClass = '\JsonApiView';

    public function indexAction($name = 'Everyone')
    {
        $this->render('index', array(
                'name' => $name
            ));
    }
}