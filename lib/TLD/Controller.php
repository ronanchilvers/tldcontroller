<?php

namespace TLD;

class Controller extends \SlimController\SlimController
{
    /**
     * Override for the default view if required
     *
     * @var string
     * @access protected
     */
    protected $_viewClass = '\TLD\View\Standard';

    /**
     * Layouts that this controller should use
     *
     * @var array
     * @access protected
     */
    protected $_layouts = array();

    /**
     * Whether to auto-render the actions after dispatch
     *
     * By default, all actions are sent through the dispatch() method
     * and are automatically rendered based on their method name. This
     * property allows this to be turned off per controller.
     *
     * @var boolean
     * @access protected
     */
    protected $_autoRender = true;

    /**
     * Dispatch method to run an action and automatically
     * render the template afterwards
     *
     * @var mixed
     * @access public
     * @return void
     */
    public function dispatch()
    {
        $args = func_get_args();
        $methodName = array_shift($args);

        call_user_func_array(array($this, $methodName), $args);

        if (true === $this->_autoRender)
        {
            $templateName = $methodName;
            $methodSuffix = $this->app->config('controller.method_suffix');
            if (empty($methodSuffix))
            {
                // Hack!! Copied from SlimController\Slim
                $methodSuffix = 'Action';
            }
            $templateName = str_replace($methodSuffix, '', $templateName);
            $this->render($templateName);
        }
    }

    /**
     * Renders output with given template
     *
     * @param string $template Name of the template to be rendererd
     * @param array  $args     Args for view
     */
    protected function render($template, $args = array())
    {
        $templatePath   = $this->app->config('templates.path');
        $reflection     = new \ReflectionClass(get_called_class());
        $templatePath   = str_replace('\\', '/', $templatePath . '/' . $reflection->getNamespaceName()) . '/views';
        $this->app->view($this->_viewClass)->setTemplatesDirectory($templatePath);

        if ($this->app->view() instanceof View\Standard)
        {
            $this->app->view()->setLayoutDirectory($this->app->config('layouts.path'));
            $this->app->view()->setLayouts($this->_layouts);
        }

        parent::render($template, $args);
    }

    /**
     * Get the current app view
     *
     * @return \Slim\View
     * @access public
     */
    public function view()
    {
        return $this->app->view();
    }
}