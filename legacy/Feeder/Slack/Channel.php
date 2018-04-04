<?php
namespace Feeder\Slack;

class Channel
{
    protected $id;
    protected $name;
    protected $isMember;

    /**
     * @var User[]
     */
    protected $members;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->name = $params['name'];
        $this->isMember = $params['is_member'];

        foreach ($params['members'] as $member) {
            $this->members[] = new UserProxy($member);
        }
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

    /**
     * @return mixed
     */
    public function isMember()
    {
        return $this->isMember;
    }

    /**
     * @return User[]
     */
    public function getMembers()
    {
        return $this->members;
    }
}