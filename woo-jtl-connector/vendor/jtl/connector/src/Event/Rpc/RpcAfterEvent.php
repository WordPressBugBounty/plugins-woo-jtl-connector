<?php
namespace jtl\Connector\Event\Rpc;

use Symfony\Contracts\EventDispatcher\Event;

class RpcAfterEvent extends Event
{
    const EVENT_NAME = 'rpc.after';

    protected $data;
    protected $controller;
    protected $action;

    public function __construct(&$data, $controller, $action)
    {
        $this->data = $data;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function getData()
    {
        return $this->data;
    }
    
    public function getController()
    {
        return $this->controller;
    }
    
    public function getAction()
    {
        return $this->action;
    }
}
