<?php

namespace TLD;

class View extends \Slim\View
{
    public function __get($key)
    {
        return $this->getData($key);
    }

    public function __set($key, $value)
    {
        $this->setData($key, $value);
    }
}