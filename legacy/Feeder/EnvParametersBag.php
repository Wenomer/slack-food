<?php
namespace Feeder;

use Feeder\Exception\MissedParameterException;

class EnvParametersBag extends ParametersBag
{
    public function __construct()
    {
        foreach ($this->params as $key => $value) {
            $value = getenv(strtoupper($key));

            if (!$value) {
                throw new MissedParameterException($key);
            }

            $this->params[$key] = $value;
        }
    }

}