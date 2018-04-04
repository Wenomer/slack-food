<?php
namespace Feeder\Slack;

class User
{
    protected $id;
    protected $name;

    public function __construct(array $params)
    {
        $this->id = $params['user_id'];
        $this->name = $params['user'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
