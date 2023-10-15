<?php

return array(
    /*!
    |--------------------------------------------------------
    |
    | Settings
    |
    |--------------------------------------------------------
    |
    | Set some default value for Log Notifier pacakage.
    |
    |
    */
    
    /**
     * Default configuration for using a queue with log notifications
     * 
     * Used if your services requires queuing 
     * 
     * @var boolean
     */
    'useQueue' => false,

    /**
     * Default configuration for delayed log notifications
     * 
     * Set 'isDelay' to true if you need to delay notifications.
     * If 'isDelay' is true, specify the delay in seconds using 'delay'.
     * 
     * @var boolean
     * @var integer
     */
    'isDelay' => false,
    'delay' => 3600,

);