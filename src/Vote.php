<?php

/**
 * Votifier PHP Client
 *
 * @package   VotifierClient
 * @author    Manuele Vaccari <manuele.vaccari@gmail.com>
 * @copyright Copyright (c) 2017-2020 Manuele Vaccari <manuele.vaccari@gmail.com>
 * @license   https://github.com/D3strukt0r/votifier-client-php/blob/master/LICENSE.txt GNU General Public License v3.0
 * @link      https://github.com/D3strukt0r/votifier-client-php
 */

namespace D3strukt0r\VotifierClient;

use D3strukt0r\VotifierClient\ServerType\ServerTypeInterface;
use D3strukt0r\VotifierClient\VoteType\VoteInterface;
use DateTime;
use Exception;

/**
 * This class is used for easy access to all classes and to send the votes.
 */
class Vote
{
    /**
     * @var VoteInterface the vote package
     */
    private $vote;

    /**
     * @var ServerTypeInterface the server type information package
     */
    private $server;

    /**
     * Gets the vote.
     *
     * @return VoteInterface return the vote
     */
    public function getVote(): VoteInterface
    {
        return $this->vote;
    }

    /**
     * Sets the vote.
     *
     * @param VoteInterface $vote The vote
     *
     * @return $this returns the class itself, for doing multiple things at once
     */
    public function setVote(VoteInterface $vote): self
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Gets the server type.
     *
     * @return ServerTypeInterface returns the server type
     */
    public function getServerType(): ServerTypeInterface
    {
        return $this->server;
    }

    /**
     * Sets the server type.
     *
     * @param ServerTypeInterface $server The server type
     *
     * @return $this returns the class itself, for doing multiple things at once
     */
    public function setServerType(ServerTypeInterface $server): self
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @param DateTime|null $timestamp [optional] A timestamp
     *
     * @throws Exception
     */
    public function send(DateTime $timestamp = null): void
    {
        $con = new ServerConnection($this->server);

        $timestamp = $timestamp ?: new DateTime();
        $this->vote->setTimestamp($timestamp);
        $this->server->send($con, $this->vote);
    }
}
