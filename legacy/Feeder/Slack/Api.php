<?php

namespace Feeder\Slack;

use Feeder\Components\Message;
use Feeder\Exception\ApiCallException;
use GuzzleHttp\Client;

class Api
{
    protected $baseUrl = '';
    protected $token;
    protected $client;

    public function __construct($baseUrl, $token = null)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
        $this->client = new Client(['base_uri' => $baseUrl]);
    }

    /**
     * @return User
     */
    public function whoAmI()
    {
        $result = $this->call('auth.test');

        return new User($result);
    }

    public function getChannels()
    {
        $channels = [];
        $results = $this->get('channels.list');
        foreach ($results['channels'] as $result) {
            $channels[] = new Channel($result);
        }

        return $channels;
    }

    public function sendMessage(Channel $channel, Message $message)
    {
        $this->post('chat.postMessage', [
            'channel' => $channel->getId(),
            'text' => $message->getText(),
            'attachments' => $message->getAttachments()
        ]);
    }

    private function post($uri, array $params = [])
    {
        $req = $this->client->request('POST', $uri, [
            'json' => $params,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getToken(),
            ]
        ]);

        $result = \GuzzleHttp\json_decode($req->getBody()->getContents(), true);

        if (!$result['ok']) {
            throw new ApiCallException($result['error']);
        }

        unset($result['ok']);

        return $result;
    }

    private function get($uri, array $params = [])
    {
        $req = $this->client->request('GET', $uri, [
            'query' => $params,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getToken(),
            ]
        ]);

        $result = \GuzzleHttp\json_decode($req->getBody()->getContents(), true);

        if (!$result['ok']) {
            throw new ApiCallException($result['error']);
        }

        unset($result['ok']);

        return $result;
    }

    private function auth()
    {
        throw new \Exception('AUTH IMPLEMENT NEEDED');

        return 'token';
    }

    private function getToken()
    {
        if ($this->token === null) {
            $this->token = $this->auth();
        }

        return $this->token;
    }
}
