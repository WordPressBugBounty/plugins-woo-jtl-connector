<?php

namespace jtl\Connector\Model;

interface AttrTypeInterface
{
    public const
        TYPE_BOOL = 'bool',
        TYPE_FLOAT = 'float',
        TYPE_INT = 'int',
        TYPE_STRING = 'string';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     * @return mixed
     */
    public function setType(string $type);
}