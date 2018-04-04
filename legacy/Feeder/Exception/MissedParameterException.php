<?php
namespace Feeder\Exception;

class MissedParameterException extends \Exception
{
    public function __construct($paramName)
    {
        parent::__construct(sprintf('Parameter "%s" missed in config file', $paramName));
    }
}