<?php

namespace D3strukt0r\VotifierClient;

use D3strukt0r\VotifierClient\ServerType\ServerTypeInterface;
use D3strukt0r\VotifierClient\VoteType\VoteInterface;

class Vote
{
    private $vote;
    private $server;

    /**
     * Vote constructor.
     *
     * @param VoteInterface       $vote
     * @param ServerTypeInterface $serverType
     */
    public function __construct(VoteInterface $vote, ServerTypeInterface $serverType)
    {
        $this->vote = $vote;
        $this->server = $serverType;
    }

    /**
     * @throws \Exception
     */
    public function send()
    {
        $con = new ServerConnection($this->server);

        $this->vote->setTimestamp();
        $this->server->send($con, $this->vote);
    }
}