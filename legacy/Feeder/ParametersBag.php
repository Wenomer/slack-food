<?php
namespace Feeder;

use Feeder\Exception\MissedConfigException;
use Feeder\Exception\MissedParameterException;
use Feeder\Exception\NotExistedParamException;

class ParametersBag
{
    protected $params = [
        'token' => null,
        'base_url' => null,
    ];

    public function __construct($fileName)
    {
        $params = parse_ini_file($fileName);

        if (!is_array($params)) {
            throw new MissedConfigException($fileName);
        }

        foreach ($this->params as $key => $value) {
            if (!isset($params[$key])) {
                throw new MissedParameterException($key);
            }

            $this->params[$key] = $params[$key];
        }
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->params)) {
            throw new NotExistedParamException($key);
        }

        return $this->params[$key];
    }
}