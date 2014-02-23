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

}