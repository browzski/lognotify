<?php 

class LogNotify{

    private $message = "";

    private $level = [];

    private $channel = [];

    public function __construct(string $message, string|array $level, string $channel)
    {
        $this->message = $message;
        $this->level = $level;
        $this->channel = $channel;
    }

}