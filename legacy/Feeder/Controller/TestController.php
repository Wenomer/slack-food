<?php
namespace Feeder\Controller;

use Feeder\Components\Bot;
use Feeder\Components\Message;
use Feeder\Slack\Api;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function messageAction(Request $request)
    {
        $api = new Api('https://slack.com/api/', '');
        $bot = new Bot($api);

        $message = new Message('Hello', 1);

        $bot->post($message);

        return $this->response('OK');
    }
}