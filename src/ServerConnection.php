<?php

namespace D3strukt0r\VotifierClient;

use D3strukt0r\VotifierClient\ServerType\ServerTypeInterface;

class ServerConnection
{
    private $serverType;
    private $s;

    /**
     * ServerConnection constructor.
     *
     * @param ServerTypeInterface $serverType
     *
     * @throws \Exception
     */
    public function __construct(ServerTypeInterface $serverType)
    {
        $this->serverType = $serverType;
        $this->s = fsockopen($serverType->getHost(), $serverType->getPort(), $errno, $errstr, 3);
        if (!$this->s) {
            $this->__destruct();
            throw new \Exception($errstr, $errno);
        }
    }

    public function __destruct()
    {
        if ($this->s) {
            fclose($this->s);
        }
    }

    /**
     * @param string $string
     *
     * @return bool
     */
    public function send($string)
    {
        if (!$this->s) {
            return false;
        }

        if (false === fwrite($this->s, $string)) {
            $this->__destruct();

            return false;
        }

        return true;
    }

    /**
     * @param int $length
     *
     * @return bool|string
     */
    public function receive($length = 64)
    {
        if (!$this->s) {
            return false;
        }

        return fread($this->s, $length);
    }
}