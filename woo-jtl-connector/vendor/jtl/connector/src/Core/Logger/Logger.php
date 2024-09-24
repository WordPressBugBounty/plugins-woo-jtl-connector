<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core
 */

namespace jtl\Connector\Core\Logger;

use jtl\Connector\Core\IO\Path;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\ProcessorInterface;

class Logger extends \Monolog\Logger
{
    const CHANNEL_CHECKSUM = 'checksum';
    const CHANNEL_DATABASE = 'database';
    const CHANNEL_ERROR = 'error';
    const CHANNEL_GLOBAL = 'global';
    const CHANNEL_LINKER = 'linker';
    const CHANNEL_RPC = 'rpc';
    const CHANNEL_SECURITY = 'security';

    /**
     * @var string
     */
    protected static $format = '';

    /**
     * @var array
     */
    protected static $logProcessors = [];

    /**
     * Adds a log record at an arbitrary level.
     *
     * @param mixed $message The log message
     * @param mixed $level The log level
     * @param string $channel The log channel
     * @return Boolean Whether the record has been processed
     */
    public static function write($message, $level = self::ERROR, $channel = self::CHANNEL_GLOBAL)
    {
        $log = self::getLogger($channel);

        return @$log->log($level, $message);
    }

    /**
     * Gets the current logger
     *
     * @param string $channel The log channel
     * @return \Monolog\Logger
     */
    public static function getLogger(string $channel): \Monolog\Logger
    {
        $logger = LoggerFactory::get($channel);
        $logLevel = self::isDeveloperLogging() ? self::DEBUG : self::INFO;
        if (!$logger->isHandling($logLevel)) {
            $handler = new RotatingFileHandler(self::createLogPath($channel), 2, $logLevel);
            $formatterClass = sprintf('Monolog\Formatter\%sFormatter', ucfirst(self::$format));

            if (class_exists($formatterClass)) {
                $handler->setFormatter(new $formatterClass());
            }

            $logger->pushHandler($handler);

            foreach (self::$logProcessors as $processor) {
                $logger->pushProcessor($processor);
            }
        }

        return $logger;
    }

    /**
     * @param string $format
     */
    public static function setFormat(string $format)
    {
        self::$format = $format;
    }

    /**
     * @param ProcessorInterface $processor
     */
    public static function addLogProcessor(ProcessorInterface $processor)
    {
        foreach (LoggerFactory::getAll() as $logger) {
            $logger->pushProcessor($processor);
        }

        self::$logProcessors[] = $processor;
    }

    /**
     * @param string $channel
     * @return string
     */
    protected static function createLogPath(string $channel): string
    {
        $pathParts = [];

        if (defined('LOG_DIR')) {
            $pathParts[] = LOG_DIR;
        } else {
            $pathParts[] = CONNECTOR_DIR;
            $pathParts[] = 'logs';
        }

        $pathParts[] = sprintf('%s.log', $channel);

        return implode('/', $pathParts);
    }

    /**
     * @return bool
     */
    protected static function isDeveloperLogging(): bool
    {
        $developerLogging = false;
        if (function_exists('Application') && !is_null(Application()->getConfig())) {
            try {
                $developerLogging = (bool)Application()->getConfig()->get('developer_logging');
            } catch (\Exception $e) {
            }
        }

        return $developerLogging;
    }
}
