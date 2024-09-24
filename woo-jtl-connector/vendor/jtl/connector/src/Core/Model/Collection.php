<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\Core\Model
 */

namespace jtl\Connector\Core\Model;

/**
 * Collection Class
 *
 * @access public
 */
class Collection implements \IteratorAggregate, \Countable
{
    protected $list;

    public function __construct(array $list = [])
    {
        $this->list = $list;
    }

    public function all()
    {
        return $this->list;
    }

    public function keys()
    {
        return array_keys($this->list);
    }

    public function replace(array $list = [])
    {
        $this->list = $list;
    }

    public function add(array $list = [])
    {
        $this->list = array_replace($this->list, $list);
    }

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->list) ? $this->list[$key] : $default;
    }

    public function set($key, $value)
    {
        $this->list[$key] = $value;
    }
    
    public function append($key, $value)
    {
        if (!$this->has($key)) {
            $this->set($key, []);
        }

        if (!is_array($this->list[$key])) {
            throw new \InvalidArgumentException(sprintf('Key "%s" is not an array', $key));
        }
            
        $this->list[$key][] = $value;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->list);
    }

    public function remove($key)
    {
        unset($this->list[$key]);
    }

    public function getAlpha($key, $default = '')
    {
        return preg_replace('/[^[:alpha:]]/', '', $this->get($key, $default));
    }

    public function getAlnum($key, $default = '')
    {
        return preg_replace('/[^[:alnum:]]/', '', $this->get($key, $default));
    }

    public function getDigits($key, $default = '', $deep = false)
    {
        return str_replace(['-', '+'], '', $this->getAlnum($key, $default));
    }

    public function getInt($key, $default = 0, $deep = false)
    {
        return (int) $this->getAlnum($key, $default);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    public function count()
    {
        return count($this->list);
    }
}
