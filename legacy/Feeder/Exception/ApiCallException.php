<?php
namespace Feeder\Exception;

class ApiCallException extends \Exception
{
    public function __construct($error)
    {
        parent::__construct(sprintf('Request returns the error: %s', $error));
    }
}