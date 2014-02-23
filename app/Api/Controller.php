<?php

namespace app\Api;

class Controller extends \TLD\Controller
{
    protected $_viewClass   = '\TLD\View\Json';
    protected $_autoRender  = false;

    public function indexAction($method = false)
    {
        $this->render(200, array('Invalid method : ' . $method));
    }

    public function fooAction()
    {
        $this->render(200, array('bar'));
    }

    public function submitAction()
    {
        $status = 200;
        $tag = $this->param('tag');
        $raw = $this->param('raw');

        if (empty($tag) || empty($raw))
        {
            $this->render(400, array('result' => 'Empty tag or error message'));
            return;
        }

        $record = \ORM::forTable('incoming_errors')->create();
        $record->set('incoming_tag', $tag)
               ->set('incoming_raw', $raw)
               ->set('incoming_status', \TLD\Incoming::STATUS_NEW)
               ->set('incoming_created', date('Y-m-d H:i:s'))
               ;

        if (false == $record->save())
        {
            $this->render(500, array('result' => 'Internal error'));
            return;
        }

        $this->render(200, array('result' => 'ok', 'id' => $record->id()));
    }

}