<?php
namespace Feeder\Slack;

class UserProxy extends User
{
    public function __construct($id)
    {
        $this->id = $id;
    }
}
