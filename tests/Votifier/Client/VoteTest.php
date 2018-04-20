<?php

namespace Votifier\Client;

use PHPUnit\Framework\TestCase;
use Votifier\Client\Vote;

class VoteTest extends TestCase
{
    private $vote = null;

    /**
     * Setup the test enviroment.
     */
    public function setUp()
    {
        $this->vote = new Vote(
            'localhost',
            8192,
            getenv('VOTIFIER_KEY'),
            'D3strukt0r',
            'Votifier-PHP-Client Test',
            '127.0.0.1'
        );
    }

    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        $this->vote = null;
    }

    /**
     * Test instance of $this->vote.
     *
     * @test
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf('Votifier\Client\Vote', $this->vote);
    }

    /**
     * Test vote return the value true.
     *
     * @test
     */
    public function testValidResult()
    {
        $this->assertEquals(true, $this->vote->send());
    }
}
