<?php
namespace Feeder\Components;

class Message
{
    private $text;
    private $attachments;

    public function __construct($text, $counter)
    {
        $this->text = $text;
        $this->attachments = $counter;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAttachments()
    {
        return [[
            'text' => 'Would you like to play a game?',
            'attachment_type' => 'default',
            'callback' => 'You are unable to choose a game',
            'color' => '#3AA3E3',
            'callback_id'=> 'wopr_game',
            'actions' => [
                [
                    'name' => 'game',
                    'text' => 'Chess ' . $this->attachments,
                    'type' => 'button',
                    'value' => $this->attachments,
                ]
            ],
        ]];
    }
}