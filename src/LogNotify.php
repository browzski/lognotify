<?php

namespace LogNotify;

use LogNotify\Exceptions\LogNotifierException;
use LogNotify\Types\LogNotifyType;
use GuzzleHttp\Client;

class LogNotify{

    /**
     * Logging messages
     * @var string
     */
    protected $message;

    /**
     * Level of logging
     * @var string
     */
    protected $level;

    /**
     * Channel for logging you want get notifications
     * @var string|array
     */
    protected $channel;

    /**
     * HTTP client (GuzzleHttp)
     */
    protected $client;

    /**
     * Token for logging notifier integrations
     * @var string
     */
    protected $token;

    public function __construct(Client $client, $token)
    {
        $this->token = $token;
        $this->client = $client;
    }

    /**
     * Set the messages for logging notifier.
     *
     * @param string $level The logging for level. (default: info)
     * @return void
     */
    public function messages(string $message = '')
    {
        return $this->setMessages($message);
    }

    /**
     * Set the level for logging notifier.
     *
     * @param string $level The logging for level.
     * @return void
     */
    public function level(string $level = '')
    {
        return $this->setLevel($level);
    }

    /**
     * Set the channel for logging notifier.
     *
     * @param string|array $channel The channel for notifications.
     * @return void
     */
    public function channel(string|array $channel = '')
    {
        return $this->setChannel($channel);
    }

    /**
     * @param string $message The message to log.
     * @return string
     */
    private function setMessages($message): string
    {
        $this->message = $message;
        return $this->message;
    }

    /**
     * @param string $level The logging level.
     * @return string
     */
    private function setLevel($level): string
    {
        $this->level = $level;
        return $this->level;
    }

    /**
     * @param string|array $channel The channel for notifications.
     * @return string|array
     */
    private function setChannel($channel): string|array
    {
        $this->channel = $channel;
        return $this->channel;
    }

    /**
     * Checking channel notify logging is support
     * 
     * @param string
     * @return boolean
     */
    private function isChannelSupport($name){
        if(in_array($name, LogNotifyType::channelSupport)){
            return true;
        }
        return false;
    }

    /**
     * Sending logging to notifier
     * 
     * @return void
     */
    public function send(): void
    {
        if(empty($this->message))
            throw LogNotifierException::missingValue('Message');

        if(empty($this->level))
            throw LogNotifierException::missingValue('Level');

        if(!$this->isChannelSupport($this->channel))
            throw LogNotifierException::missingChannel();
        
        $this->notifyHandler();
    }

    private function notifyHandler(): void
    {
        if(strtolower($this->channel) === 'discord')
            $this->discordNotify();

        if(strtolower($this->channel) === 'telegram')
            $this->telegramNotify();
    }

    private function discordNotify(): void
    {
        $discord_url = '';
        $this->client->request(
            'POST',
            $discord_url,
            [] 
        );
    }

    private function telegramNotify(): void
    {
        $telegram_url = '';
        $this->client->request(
            'POST',
            $telegram_url,
            [] 
        );
    }

}