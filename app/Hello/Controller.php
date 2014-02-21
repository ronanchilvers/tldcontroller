<?php

namespace app\Hello;

class Controller extends \TLD\Controller
{
    public function indexAction($name)
    {
        $this->render('index', array(
                'name' => $name
            ));
    }
}