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
            '8192',
            'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoTc+zUuPLFASP1+JdYVHkT+nsFxOx+mo8yLPGyPA42w3QAZA3ZNzNXWK01gl9o6G3wmiHGi2lwgGW+3IAbOYuEa+Wv0STHE9IOf+T/tDRg0agjrNnWs7un8LUJL0UvI/hMRbrsPJeWy38PbTLC2Bvl0WhU3IsakUWs3mI6Q1INr924zjeCkngOMRjApiA5IJI0OznU50bNdanA6oIFxy83IBpgA4cnccWBSB2g80LDJOxCfUP7oJGw2VJqyBTR5Xi6lAoSv+9uGMTj99W+Ib6a42fLSe6a2FxmyHi7BU7n9W/LAPYxxmelsE3EIKxWK6UBk6i28fpbMi6S1KVV/6lwIDAQAB',
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
