<?php

namespace TLD;

class Slim extends \SlimController\Slim
{

    /**
     * Builds closure callback from controller route
     *
     * This method is overriden here to allow the use
     * of a dispatch method in the controller. The
     * reason for doing this is to allow automatic view
     * rendering based on controller action name.
     *
     * @param $route
     *
     * @return \Closure
     */
    protected function buildCallbackFromControllerRoute($route)
    {
        list($className, $methodName) = $this->determineClassAndMethod($route);
        $app      = & $this;
        $callable = function () use ($app, $className, $methodName) {
            $args     = func_get_args();
            array_unshift($args, $methodName);
            $instance = new $className($app);

            return call_user_func_array(array($instance, 'dispatch'), $args);
        };

        return $callable;
    }

}