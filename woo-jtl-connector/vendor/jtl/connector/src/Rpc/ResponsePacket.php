<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Rpc;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\RpcException;

/**
 * Rpc Response Packet
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class ResponsePacket extends Packet
{
    /**
     * This member is REQUIRED on success.
     * This member MUST NOT exist if there was an error invoking the method.
     * The value of this member is determined by the method invoked on the
     * Server.
     *
     * @var mixed
     */
    protected $result;

    /**
     * This member is REQUIRED on error This member MUST NOT exist if there was
     * no error triggered during invocation.
     * The value for this member MUST be an Object as defined in section 5.1.
     *
     * @var Error|null
     * @Serializer\Type("Jtl\Connector\Core\Rpc\Error")
     */
    protected ?Error $error = null;

    /**
     * @return boolean
     * @throws RpcException
     */
    public function isValid(): bool
    {
        $isValid = true;

        // JSON-RPC protocol
        if ($this->getJtlrpc() !== '2.0') {
            $isValid = false;
        }

        // This member MUST NOT exist if there was an error invoking the method.
        //if ($this->getResult() !== null && $this->getError() !== null) {
        //$isValid = false;
        //}

        // This member MUST NOT exist if there was no error triggered during
        // invocation.
        if ($this->getResult() === null && $this->getError() === null) {
            $isValid = false;
        }

        if (($error = $this->getError()) !== null) {
            $error->validate();
        }

        // An identifier established by the Client that MUST contain a String,
        // Number, or NULL value if included
        if ($this->getId() === '') {
            $isValid = false;
        }

        return $isValid;
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
     * @return ResponsePacket
     */
    public function setResult($result): ResponsePacket
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Error
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * @param Error $error
     *
     * @return ResponsePacket
     */
    public function setError(Error $error): ResponsePacket
    {
        $this->error = $error;

        return $this;
    }
}
