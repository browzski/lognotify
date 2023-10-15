<?php

namespace Browszki\LogNotify;

use Browszki\LogNotify\Exceptions\LogNotifierException;
use Browszki\LogNotify\Types\LogNotifyType;

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
        
        //Logic Here
    }

}