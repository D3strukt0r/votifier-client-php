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

use D3strukt0r\VotifierClient\ServerType\ClassicVotifier;
use D3strukt0r\VotifierClient\VoteType\ClassicVote;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class VoteTest.
 *
 * @covers \D3strukt0r\VotifierClient\Vote
 *
 * @internal
 */
final class VoteTest extends TestCase
{
    /**
     * @var Vote The main object
     */
    private $object;

    /**
     * @requires PHPUnit >= 8
     */
    protected function setUp(): void
    {
        $stubServerType = $this->createStub(ClassicVotifier::class);
        $stubServerType->method('send');

        $this->object = (new Vote())
            ->setServerType($stubServerType)
            ->setVote(new ClassicVote('mock_user', 'mock_service', 'mock_address'))
        ;
    }

    protected function tearDown(): void
    {
        $this->object = null;
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf('D3strukt0r\VotifierClient\Vote', $this->object);
    }

    public function testConstruct(): void
    {
        $stubServerType = $this->createStub(ClassicVotifier::class);
        $stubServerType->method('send');

        $stubVote = $this->createStub(ClassicVote::class);

        $testObject = (new Vote())->setServerType($stubServerType)->setVote($stubVote);
        $this->assertSame($stubServerType, $testObject->getServerType());
        $this->assertSame($stubVote, $testObject->getVote());
    }

    public function testSend(): void
    {
        $timestamp = new DateTime();
        $this->assertNull($this->object->send($timestamp));
        $this->assertSame($timestamp->getTimestamp(), $this->object->getVote()->getTimestamp());
    }
}
