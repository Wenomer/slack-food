<?php
namespace Feeder\Exception;

class MissedConfigException extends \Exception
{
    public function __construct($fileName)
    {
        parent::__construct(sprintf('Can\' read parameters file "%s"', $fileName));
    }
}