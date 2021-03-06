**\\D3strukt0r\\Votifier\\Client\\Server**

==========
NuVotifier
==========

.. php:namespace:: D3strukt0r\Votifier\Client\Server
.. php:class:: NuVotifier

    The Class to access a server which uses the plugin "NuVotifier".

    .. php:attr:: protected $socket

        :php:class:`D3strukt0r\\Votifier\\Client\\Socket` — The socket object

    .. php:attr:: protected $host

        string — The domain or ip to connect to Votifier

    .. php:attr:: protected $port

        int — The port which votifier uses on the server

    .. php:attr:: protected $publicKey

        string — The public.key which is generated by the plugin

    .. php:attr:: protected $protocolV2

        bool — Use version 2 of the protocol

    .. php:attr:: protected $token

        string|null — The token from the config.yml

    .. php:method:: public getSocket() -> Socket

        Gets the Socket.

        :returns: :php:class:`D3strukt0r\\Votifier\\Client\\Socket` — Returns a Socket object

    .. php:method:: public setSocket($socket) -> $this

        Sets the Socket.

        :param string $socket: The socket object

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public getHost() -> string|null

        Gets the host.

        :returns: string|null — Returns the host

    .. php:method:: public setHost($host) -> $this

        Sets the host.

        :param string $host: The host

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public getPort() -> int

        Gets the port.

        :returns: int — Returns the port

    .. php:method:: public setPort($port) -> $this

        Sets the port.

        :param int $port: The port

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public getPublicKey() -> string|null

        Gets the public key.

        :returns: string|null — Returns the public key

    .. php:method:: public setPublicKey($publicKey) -> $this

        Sets the public key.

        :param string $publicKey: The public key

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public isProtocolV2() -> bool

        Checks whether the connection uses the version 2 protocol.

        :returns: bool — Returns true, if using the new version of NuVotifier or false otherwise

    .. php:method:: public setProtocolV2($isProtocolV2) -> $this

        Sets whether to use version 2 of the protocol.

        :param bool $isProtocolV2: Whether to use version 2 of the protocol

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public getToken() -> string|null

        Gets the token from the config.yml.

        :returns: string|null — Returns The token from the config.yml

    .. php:method:: public setToken($token) -> $this

        Sets the token from the config.yml.

        :param string|null $token: The token from the config.yml

        :returns: $this — Returns the class itself, for doing multiple things at once

    .. php:method:: public verifyConnection()

        Checks if the server actually belongs to Votifier.

        :throws: :php:exc:`InvalidArgumentException`

            If one required parameter wasn't set

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\Socket\\NoConnectionException`

            If connection couldn't be established

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\Socket\\PackageNotReceivedException`

            If there was an error receiving the package

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NotVotifierException`

            If the server we are connected to is not a valid Votifier server

    .. php:method:: public sendVote(...$votes)

        Sends the vote packages to the server.

        :param \\D3strukt0r\\Votifier\\Client\\Vote\\VoteInterface $votes: The vote packages

        :throws: :php:exc:`InvalidArgumentException`

            If one required parameter wasn't set

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\Socket\\NoConnectionException`

            If connection couldn't be established

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\Socket\\PackageNotSentException`

            If there was an error receiving the package

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\Socket\\PackageNotReceivedException`

            If there was an error sending the package

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NotVotifierException`

            If the server we are connected to is not a valid Votifier server

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NuVotifierException`

            General NuVotifier Exception (an unknown exception)

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NuVotifierChallengeInvalidException`

            NuVotifier says the challenge was invalid

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NuVotifierSignatureInvalidException`

            NuVotifier says the signature was invalid

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NuVotifierUnknownServiceException`

            NuVotifier says that the service is unknown (the token doesn't belong to the service name)

        :throws: :php:exc:`D3strukt0r\\Votifier\\Client\\Exception\\NuVotifierUsernameTooLongException`

            NuVotifier says the username is too long

    .. php:method:: protected checkRequiredVariablesForPackage($vote)

        Check that service name, username, address, timestamp and token have been set.

        :param D3strukt0r\\Votifier\\Client\\Vote\\VoteInterface $vote: The vote to check

        :throws: :php:exc:`InvalidArgumentException`

            If one required parameter wasn't set

    .. php:method:: protected verifyConnection($header) -> bool

        Verifies that the connection is correct.

        :param string|null $header: The header that the plugin usually sends

        :returns: bool — Returns true if connections is available, otherwise false

    .. php:method:: protected preparePackage($vote) -> string

        Create encrypted package for default Votifier.

        :param \\D3strukt0r\\Votifier\\Client\\Vote\\VoteInterface $vote: The vote package with all the information

        :returns: string — Returns the string to be sent to the server

    .. php:method:: protected preparePackageV2($vote, $challenge) -> string

        Prepares the vote package to be sent as version 2 protocol package.

        :param D3strukt0r\\Votifier\\Client\\Vote\\VoteInterface $vote: The vote package with information
        :param string $challenge: The challenge sent by the server

        :returns: string — Returns the string to be sent to the server
