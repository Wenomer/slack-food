<?php
namespace Feeder\Components;

use Feeder\Slack\Api;
use Feeder\Slack\Channel;
use Feeder\Slack\User;

class Bot
{
    /**
     * @var User
     */
    private $user;
    private $channel;
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function getUser()
    {
        if ($this->user === null) {
            $this->user = $this->api->whoAmI();
        }

        return $this->user;
    }

    /**
     * @return Channel
     */
    public function getChannel()
    {
        if ($this->channel === null) {
            foreach ($this->getChannels() as $channel) {
                if ($channel->isMember()) {
                    $this->channel = $channel;
                }
            }
        }

        return $this->channel;
    }

    /**
     * @return Channel[]
     */
    public function getChannels()
    {
        return $this->api->getChannels();
    }

    public function post(Message $message)
    {
        $this->api->sendMessage($this->getChannel(), $message);
    }
}