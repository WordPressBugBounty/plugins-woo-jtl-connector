<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\SyncError;

class SyncErrorEntry
{
    protected string $controller;
    protected string $action;
    protected string $entityId;
    protected string $message;
    protected string $createdAt;

    /**
     * @param string $controller
     * @param string $action
     * @param string $entityId
     * @param string $message
     * @param string $createdAt
     */
    public function __construct(
        string $controller,
        string $action,
        string $entityId,
        string $message,
        string $createdAt = ''
    ) {
        $this->controller = $controller;
        $this->action     = $action;
        $this->entityId   = $entityId;
        $this->message    = $message;
        $this->createdAt  = $createdAt !== '' ? $createdAt : \date('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
