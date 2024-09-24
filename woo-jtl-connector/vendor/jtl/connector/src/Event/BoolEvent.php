<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

class BoolEvent extends Event
{
    /**
     * @var bool
     */
    protected bool $result;

    /**
     * BoolEvent constructor.
     *
     * @param boolean $result
     */
    public function __construct(bool &$result)
    {
        $this->result = &$result;
    }

    /**
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @param boolean $result
     *
     * @return BoolEvent
     */
    public function setResult(bool $result): BoolEvent
    {
        $this->result = $result;
        return $this;
    }
}
