<?php
namespace Feeder\Exception;

class NotExistedParamException extends \Exception
{
    public function __construct($paramName)
    {
        parent::__construct(sprintf('Not existing param "%s"', $paramName));
    }
}