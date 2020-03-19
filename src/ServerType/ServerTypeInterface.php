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

namespace D3strukt0r\VotifierClient\ServerType;

use D3strukt0r\VotifierClient\ServerConnection;
use D3strukt0r\VotifierClient\VoteType\VoteInterface;

/**
 * The interface ServerTypeInterface is used to define a PluginType on the server.
 */
interface ServerTypeInterface
{
    /**
     * Returns the host.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Returns the port.
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Returns the public key.
     *
     * @return string
     */
    public function getPublicKey(): string;

    /**
     * Verifies that the connection is correct.
     *
     * @param string $header (Required) The header that the plugin usually sends
     *
     * @return bool
     */
    public function verifyConnection(?string $header): bool;

    /**
     * Sends the vote package to the server.
     *
     * @param ServerConnection $connection (Required) The connection type to the plugin
     * @param VoteInterface    $vote       (Required) The vote type package
     *
     * @throws \Exception
     */
    public function send(ServerConnection $connection, VoteInterface $vote): void;
}
