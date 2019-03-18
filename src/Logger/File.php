<?php

namespace Weather\Logger;

class File implements LoggerInterface
{
    const FILE_NAME = 'weather.log';

    protected $path;

    public function __construct($path) 
    {
        $path .= '/';

        $path .= self::FILE_NAME;

        $this->path = $path;
    }

    public function log($message)
    {
        error_log('time: ' . time() . ' ' . $message . "\n", 3, $this->path);

    }
}