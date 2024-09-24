<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

class ArrayKeyDoesNotExistException extends \RuntimeException
{
    /**
     * @param string|int $key
     *
     * @return self
     */
    public static function fromKey($key): self
    {
        return new self(\sprintf('Key "%s" does not exist', $key));
    }
}
