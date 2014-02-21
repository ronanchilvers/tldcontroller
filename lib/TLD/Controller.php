<?php

namespace TLD;

class Controller extends \SlimController\SlimController
{
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
        $this->app->view()->setTemplatesDirectory($templatePath);
        parent::render($template, $args);
    }

}