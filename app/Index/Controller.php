<?php

namespace app\Index;

class Controller extends \TLD\Controller
{
    public function indexAction()
    {
        $this->render('index', array(
                'date' => date('Y-m-d')
            ));
    }

    public function helloAction($name)
    {
        // $this->app->response()->status(404);
        $this->render('hello', array(
                'name' => $name
            ));
    }
}