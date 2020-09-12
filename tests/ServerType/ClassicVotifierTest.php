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

use D3strukt0r\VotifierClient\Exception\NotVotifierException;
use D3strukt0r\VotifierClient\Exception\Socket\NoConnectionException;
use D3strukt0r\VotifierClient\Exception\Socket\PackageNotSentException;
use D3strukt0r\VotifierClient\Socket;
use D3strukt0r\VotifierClient\VoteType\ClassicVote;
use PHPUnit\Framework\TestCase;

use function file_get_contents;

use const DIRECTORY_SEPARATOR;

/**
 * Class ClassicVotifierTest.
 *
 * @covers \D3strukt0r\VotifierClient\ServerType\ClassicVotifier
 *
 * @internal
 */
final class ClassicVotifierTest extends TestCase
{
    /**
     * @var Socket The Socket tool class
     */
    private $socketStub;

    /**
     * @var ClassicVotifier The main class
     */
    private $classicVotifier;

    protected function setUp(): void
    {
        $this->socketStub = $this->createStub(Socket::class);
        $this->classicVotifier = (new ClassicVotifier())
            ->setSocket($this->socketStub)
            ->setHost('mock_host')
            ->setPort(0)
            ->setPublicKey(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'votifier_public.key'))
        ;
    }

    protected function tearDown(): void
    {
        $this->socketStub = null;
        $this->classicVotifier = null;
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf('D3strukt0r\VotifierClient\ServerType\ClassicVotifier', $this->classicVotifier);
    }

    public function testNoConnectionException(): void
    {
        $this->socketStub
            ->method('open')
            ->willThrowException(new NoConnectionException())
        ;

        $voteStub = $this->createStub(ClassicVote::class);

        $this->expectException(NoConnectionException::class);
        $this->classicVotifier->sendVote($voteStub);
    }

    /**
     * @requires PHPUnit >= 8
     */
    public function testNotVotifierException(): void
    {
        $this->socketStub
            ->method('read')
            ->willReturn('SOMETHING_WEIRD')
        ;

        $voteStub = $this->createStub(ClassicVote::class);

        $this->expectException(NotVotifierException::class);
        $this->classicVotifier->sendVote($voteStub);
    }

    /**
     * @requires PHPUnit >= 8
     */
    public function testPackageNotSentException(): void
    {
        $this->socketStub
            ->method('read')
            ->willReturn('VOTIFIER 1.9')
        ;
        $this->socketStub
            ->method('write')
            ->willThrowException(new PackageNotSentException())
        ;

        $voteStub = $this->createStub(ClassicVote::class);

        $this->expectException(PackageNotSentException::class);
        $this->classicVotifier->sendVote($voteStub);
    }

    /**
     * @requires PHPUnit >= 8
     */
    public function testSend(): void
    {
        $this->socketStub
            ->method('read')
            ->willReturn('VOTIFIER 1.9')
        ;

        $voteStub = $this->createStub(ClassicVote::class);

        $this->assertNull($this->classicVotifier->sendVote($voteStub));
    }
}
