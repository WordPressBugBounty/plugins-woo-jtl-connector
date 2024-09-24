<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Application;

class Response
{
    /** @var mixed */
    protected $result;

    /**
     * Response constructor.
     *
     * @param mixed $result
     *
     */
    public function __construct($result)
    {
        $this->setResult($result);
    }

    /**
     * @param mixed $result
     *
     * @return self
     */
    public static function create($result): self
    {
        return new self($result);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     *
     * @return $this
     */
    public function setResult($result): self
    {
        $this->result = $result;
        return $this;
    }
}
